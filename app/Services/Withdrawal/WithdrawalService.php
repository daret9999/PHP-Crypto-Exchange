<?php

namespace App\Services\Withdrawal;

use App\Jobs\Withdrawal\WithdrawalCancelJob;
use App\Jobs\Withdrawal\WithdrawalProcessJob;
use App\Mail\Withdrawal\WithdrawalComplete;
use App\Models\Withdrawal\WalletWithdrawal;
use App\Services\Logger\Logger;
use App\Services\Wallet\SystemWalletService;
use Codemenco\Advcash\AdvcashApi;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Wallet\Wallet;

class WithdrawalService
{
    protected $withdrawal;

    public function __construct(WalletWithdrawal $withdrawal)
    {
        $this->withdrawal = $withdrawal;
    }

    public function show()
    {
        $data['withdrawal'] = $this->withdrawal;
        $data['title'] = __("Withdrawal Details");
        return view('withdrawal.admin.show', $data);
    }

    public function destroy()
    {
        if ($this->withdrawal->status !== STATUS_REVIEWING) {
            return redirect()
                ->back()
                ->with(RESPONSE_TYPE_WARNING, __("The withdrawal cancellation is under process."));
        }

        if ($this->withdrawal->update(['status' => STATUS_CANCELING])) {
            WithdrawalCancelJob::dispatch($this->withdrawal);
            return redirect()
                ->route(replace_current_route_action('index'))
                ->with(RESPONSE_TYPE_SUCCESS, __("The withdrawal cancellation will be processed shortly."));
        }
        return redirect()
            ->back()
            ->with(RESPONSE_TYPE_SUCCESS, __("Failed to cancel withdrawal."));
    }

    public function cancel()
    {
        DB::beginTransaction();
        try {
            //Change withdrawal status to FAILED
            if (!$this->withdrawal->update(['status' => STATUS_FAILED])) {
                throw new Exception(__("Failed to change status as canceled"));
            }

            //Increase wallet balance
            if (!$this->withdrawal->wallet()->increment('primary_balance', $this->withdrawal->amount)) {
                throw new Exception(__("Failed to update wallet."));
            }

        } catch (Exception $exception) {
            DB::rollBack();
            Logger::error($exception, "[FAILED][WithdrawalService][cancel]");
            return;
        }

        DB::commit();
        return;
    }

    public function approve()
    {
        if ($this->withdrawal->status !== STATUS_REVIEWING) {
            return redirect()
                ->back()
                ->with(RESPONSE_TYPE_WARNING, __("The withdrawal is under processing."));
        }

        if (!$this->withdrawal->update(['status' => STATUS_PENDING])) {
            return [
                RESPONSE_STATUS_KEY => false,
                RESPONSE_MESSAGE_KEY => __('Failed to change status as processing.')
            ];
        }

        if ($this->withdrawal->api === API_ADVCASH) {
            return $this->ADVcashWithdraw();
        } else {
            WithdrawalProcessJob::dispatch($this->withdrawal);
        }

        return [
            RESPONSE_STATUS_KEY => true,
            RESPONSE_MESSAGE_KEY => __('Withdrawal has been approved successfully.')
        ];
    }

    public function withdraw()
    {
        $api = $this->withdrawal->coin->getAssociatedApi($this->withdrawal->api);
        if (is_null($api)) {
            throw new Exception(__('Unable to call API'));
        } else {
            $amountToBeSend = bcsub($this->withdrawal->amount, $this->withdrawal->system_fee);
            $apiCallNeeded = true;

            DB::beginTransaction();
            try {
                //Check if the withdrawal is internal
                if ($this->withdrawal->api === API_BANK) {
                    $this->withdrawal->status = STATUS_COMPLETED;
                    $this->withdrawal->txn_id = sprintf('transfer-%s', Str::uuid()->toString());
                    $apiCallNeeded = false;
                } elseif ($recipientWallet = $this->withdrawal->getRecipientWallet()) {
                    $this->withdrawal->status = STATUS_COMPLETED;
                    $recipientWallet->increment('primary_balance', $amountToBeSend);
                    $this->withdrawal->txn_id = sprintf('transfer-%s', Str::uuid()->toString());
                    $apiCallNeeded = false;
                }

                if (bccomp($this->withdrawal->system_fee, '0') > 0) {
                    if (!app(SystemWalletService::class)->addFee($this->withdrawal->user, $this->withdrawal->symbol, $this->withdrawal->system_fee)) {
                        throw new Exception(__("Failed to update system fee to system wallet."));
                    }
                }
                if ($apiCallNeeded) {
                    switch ($this->withdrawal->coin->api['selected_apis']) {
                        case API_TRON:
                        case API_TRC20:
                            $conditions = [
                                'id' => $this->withdrawal->wallet_id,
                                'symbol' => $this->withdrawal->symbol
                            ];
                            $wallet = Wallet::where($conditions)->first();
                            $response = $api->sendToAddress($this->withdrawal->address,$amountToBeSend,$wallet->address,$wallet->private_key);
                            //$response = $api->sendToAddress($this->withdrawal->address, $amountToBeSend);
                            if ($response[RESPONSE_STATUS_KEY]) {
                                $this->withdrawal->status = $response[RESPONSE_DATA]['status'];
                                $this->withdrawal->txn_id = $response[RESPONSE_DATA]['txn_id'];
                                $this->withdrawal->update();
                                DB::commit();
                            } else {
                                DB::rollBack();
                                return false;
                            }
                            break;
                        default:
                            $response = $api->sendToAddress($this->withdrawal->address, $amountToBeSend);
                            if ($response[RESPONSE_STATUS_KEY]) {
                                $this->withdrawal->status = $response[RESPONSE_DATA]['status'];
                                $this->withdrawal->txn_id = $response[RESPONSE_DATA]['txn_id'];
                                $this->withdrawal->update();
                                DB::commit();
                            } else {
                                DB::rollBack();
                                return false;
                            }
                            break;
                    }

                } else {
                    $this->withdrawal->update();
                    DB::commit();
                }
            } catch (Exception $exception) {
                DB::rollBack();
                Logger::error($exception, "[FAILED][WithdrawalService][withdraw]");
                return false;
            }
        }

        if ($this->withdrawal->api === API_BANK) {
            Mail::to($this->withdrawal->user->email)->send(new WithdrawalComplete($this->withdrawal));
        }
        return true;
    }

    public function ADVcashWithdraw()
    {
        $api = $this->withdrawal->coin->getAssociatedApi($this->withdrawal->api);
        if (is_null($api)) {
            throw new Exception(__('Unable to call API'));
        } else {
            $amountToBeSend = bcsub($this->withdrawal->amount, $this->withdrawal->system_fee);
            //Check if the withdrawal is internal

            try {
                $sendMoneyResponse = null;
                $advcash_api = new AdvcashApi;
                $sendMoneyResponse = $advcash_api->sendMoney($amountToBeSend, $this->withdrawal->symbol, $this->withdrawal->user->email, 'Withdrawal From HNC-Revolution', false);

                if (!empty($sendMoneyResponse)) {
                    if (bccomp($this->withdrawal->system_fee, '0') > 0) {
                        if (!app(SystemWalletService::class)->addFee($this->withdrawal->user, $this->withdrawal->symbol, $this->withdrawal->system_fee)) {
                            throw new Exception(__("Failed to update system fee to system wallet."));
                        }
                    }

                    $this->withdrawal->status = STATUS_COMPLETED;
                    $this->withdrawal->txn_id = $sendMoneyResponse;
                    $this->withdrawal->update();

                    Mail::to($this->withdrawal->user->email)->send(new WithdrawalComplete($this->withdrawal));

                    return [
                        RESPONSE_STATUS_KEY => true,
                        RESPONSE_MESSAGE_KEY => __('Withdrawal has been approved successfully.')
                    ];
                }

            } catch (Exception $exception) {
                $conditions = [
                    'id' => $this->withdrawal->wallet_id,
                    'symbol' => $this->withdrawal->symbol
                ];
                $wallet = Wallet::where($conditions)->first();
                $wallet->increment('primary_balance', $amountToBeSend);

                $this->withdrawal->status = STATUS_FAILED;
                $this->withdrawal->txn_id = $exception->getMessage();
                $this->withdrawal->update();
                return [
                    RESPONSE_STATUS_KEY => false,
                    RESPONSE_MESSAGE_KEY => $exception->getMessage()
                ];
            }
        }
    }
}
