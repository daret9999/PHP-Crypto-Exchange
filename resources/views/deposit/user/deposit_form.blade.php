@extends('layouts.master',['hideBreadcrumb'=>true,'activeSideNav' => active_side_nav(),'topLess' => true])
@section('title', $title)
@section('content')
    @include('layouts.dashboard.title')
    @component('components.card')
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$title}}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center text-light">
                            <div class="card lf-toggle-bg-card lf-toggle-border-color">
                                <div class="card-header bg-primary">
                                    <h3 class="text-bold text-lg-center text-light m-0 font-weight-bold">{{ $wallet->symbol }}</h3>
                                    <p class="text-sm-center text-light mb-0">({{ $wallet->coin->name }})</p>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <img src="{{ get_coin_icon($wallet->coin->icon) }}" alt="{{ $wallet->symbol }}"
                                             class="img-rounded img-fluid lf-w-120px">
                                    </div>
                                </div>
                                <div class="card-footer bg-success">
                                    <h4 class="m-0">{{ __("Balance :balance", ['balance' => $wallet->primary_balance]) }}</h4>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-9">
                            <div class="card lf-toggle-bg-card lf-toggle-border-color">
                                <div class="card-body">
                                    @if($wallet->coin->deposit_status == ACTIVE)
                                        {!! Form::open(['route'=>['user.wallets.deposits.store', $wallet->symbol], 'method' => 'post',
                                        'class'=>'form-horizontal validator dark-text-color', 'id' => 'depositForm']) !!}
                                        {{--api--}}
                                        <div class="form-group">
                                            <label for="api"
                                                   class="control-label required">{{ __('Deposit with') }}</label>
                                            <div>
                                                {{ Form::select('api', $apis, null, ['class'=> form_validation($errors, 'api'), 'id' => 'api', 'placeholder' => __('Select payment method'), '@change' => 'changePaymentMethod']) }}
                                                <span class="invalid-feedback"
                                                      data-name="api">{{ $errors->first('api') }}</span>
                                            </div>
                                        </div>

                                        <div v-if="showBank">
                                            {{--bank_account_id--}}
                                            <div class="form-group">
                                                <label for="bank_account_id"
                                                       class="control-label required">{{ __('Select a Bank') }}</label>
                                                <div>
                                                    @forelse($bankAccounts as $bankAccountId => $bankAccountName)
                                                        <div class="lf-radio">
                                                            {{ Form::radio('bank_account_id', $bankAccountId, null, ['id' => 'bank-' . $bankAccountId,
                                                            'class' => 'form-check-input']) }}
                                                            <label class="form-check-label"
                                                                   for="bank-{{ $bankAccountId }}">
                                                                {{ $bankAccountName }}
                                                            </label>
                                                        </div>
                                                    @empty
                                                        <div class="font-weight-bold">
                                                            {{ __('No Bank Account is available.') }}
                                                            <a href="{{ route('bank-accounts.create') }}">{{ __('Please add bank.') }}</a>
                                                        </div>
                                                    @endforelse

                                                    <span class="invalid-feedback"
                                                          data-name="bank_account_id">{{ $errors->first('bank_account_id') }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        {{--amount--}}
                                        <div class="form-group">
                                            <label for="amount"
                                                   class="control-label required">{{ __('Amount') }}</label>
                                            <div>
                                                {{ Form::text('amount',  null, ['class'=>form_validation($errors, 'amount'), 'id' => 'amount', 'placeholder' => __('ex: 20.99')]) }}
                                                <span class="invalid-feedback"
                                                      data-name="amount">{{ $errors->first('amount') }}</span>
                                            </div>
                                        </div>

                                        {{--deposit_policy--}}
                                        <div class="form-group">
                                            <label class="control-label"></label>
                                            <div class="d-flex">
                                                <div class="lf-checkbox">
                                                    {{ Form::checkbox('deposit_policy', 1, false, ['id' => 'policy']) }}
                                                    <label for="policy"> {{ __("Accept deposit's policy.") }}</label>
                                                </div>
                                                <a class="ml-2 text-info"
                                                   href="{{ settings('deposit_policy_page_url') }}"><small>{{ __("Deposit's policy page") }}</small></a>
                                            </div>
                                            <span class="invalid-feedback"
                                                  data-name="deposit_policy">{{ $errors->first('deposit_policy') }}</span>
                                        </div>

                                        {{--submit button--}}
                                        <div class="form-group">
                                            <div class="col-md-offset-2 ">
                                                {{ Form::submit(__('Deposit Balance'),['class'=>'btn btn-info form-submission-button']) }}
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    @else
                                        <div class="text-center">
                                            <h4 class="bg-gray-light py-5 font-weight-bold text-muted"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="{{ __('Click to copy') }}">
                                                {{ $wallet->symbol. ' '. __('Deposit is currently disabled.') }}
                                            </h4>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('Important Information')}}</h4>
                </div>
                <div class="card-body">
                    <div class="important-info">
                        <ul>
                            <li>
                                <i class="mdi mdi-checkbox-blank-circle"></i>
                                {{__('For security reasons, The Platform process withdrawals by review once a day. For more information in this policy. Please see our wallet security page. ')}}
                            </li>
                            <li>
                                <i class="mdi mdi-checkbox-blank-circle"></i>
                                {{__('Submit your withdrawals by 07:00 UTC +00 (about 11 hour) to be included in the days batch')}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endcomponent
@endsection

@section('script')
    @if(language(App()->getLocale())['direction']==PAGE_DIRECTION_RIGHT_TO_LEFT)
        <script src="{{ asset('plugins/cvalidator/cvalidator-language-fa.js') }}"></script>
    @else
        <script src="{{ asset('plugins/cvalidator/cvalidator-language-en.js') }}"></script>
    @endif
    <script src="{{ asset('plugins/cvalidator/cvalidator.js') }}"></script>
    <script>
        "use strict";

        $(document).ready(function () {
            var form = $('#depositForm').cValidate({
                rules: {
                    'api': 'required',
                    'bank_account_id': 'requiredIf:api,{{API_BANK}}',
                    'amount': 'required|numeric|between:0.00000001,99999999999.99999999|decimalScale:11,8',
                    'deposit_policy': 'required'
                }
            });
        });

        new Vue({
            el: '#app',
            data: {
                showBank: "{{ old('api') === API_BANK ? true : false }}",
            },
            methods: {
                changePaymentMethod(event) {
                    this.showBank = event.target.value == "{{ API_BANK }}" ? true : false;
                }
            }
        });
    </script>
@endsection
