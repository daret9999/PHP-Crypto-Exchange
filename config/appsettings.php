<?php
return [
    'settings' => [
        'preference' => [
            'icon' => 'fa-home',
            'settings' => [
                'general' => [
                    'company_name' => [
                        'field_type' => 'text',
                        'validation' => 'required',
                        'field_label' => 'Company Name',
                    ],
                    'lang' => [
                        'field_type' => 'select',
                        'field_value' => 'language_short_code_list',
                        'default' => config('app.locale'),
                        'field_label' => 'Default Site Language',
                    ],
                    'lang_switcher' => [
                        'field_type' => 'switch',
                        'field_label' => 'Language Switcher',
                    ],
                    'lang_switcher_item' => [
                        'field_type' => 'radio',
                        'field_value' => 'language_switcher_items',
                        'default' => 'icon',
                        'field_label' => 'Display Language Switch Item',
                    ],
                    'preloader' => [
                        'field_type' => 'switch',
                        'field_label' => 'Display Preloader',
                    ],
                    'maintenance_mode' => [
                        'field_type' => 'switch',
                        'field_label' => 'Maintenance mode',
                    ],
                    'layout_mode_dark' => [
                        'field_type' => 'switch',
                        'field_label' => 'Layout Mode Dark',
                    ],
                ],
                'accounts' => [
                    'registration_active_status' => [
                        'field_type' => 'switch',
                        'field_label' => 'Allow Registration',
                    ],
                    'default_role_to_register' => [
                        'field_type' => 'select',
                        'field_value' => 'get_user_roles',
                        'field_label' => 'Default registration role',
                    ],
                    'require_email_verification' => [
                        'field_type' => 'switch',
                        'field_label' => 'Require Email Verification',
                    ],
                    'require_mobile_verification' => [
                        'field_type' => 'switch',
                        'field_label' => 'Require Mobile Verification',
                    ],
                    'sms_provider_service' => [
                        'field_type' => 'switch',
                        'field_label' => 'Twilo or Kavenegar',
                    ],
                    'twilo_sid' => [
                        'field_type' => 'text',
                        'field_label' => 'Twilo SID',
                    ],
                    'twilo_auth' => [
                        'field_type' => 'text',
                        'field_label' => 'Twilo AUTH',
                    ],
                    'twilo_sender' => [
                        'field_type' => 'text',
                        'field_label' => 'Twilo Sender Number',
                    ],
                    'display_google_captcha' => [
                        'field_type' => 'switch',
                        'field_label' => 'Google Captcha Protection',
                    ],
                    'admin_receive_email' => [
                        'field_type' => 'text',
                        'validation' => 'required|email',
                        'field_label' => 'Email to receive customer feedback',
                    ],
                ],
                'referral' => [
                    'referral' => [
                        'field_type' => 'switch',
                        'type_function' => true,
                        'data_array' => 'active_status',
                        'field_label' => 'Referral',
                    ],
                    'referral_percentage' => [
                        'field_type' => 'text',
                        'data_type' => 'numeric',
                        'max' => '100',
                        'min' => '0',
                        'field_label' => 'Referral Percentage',
                    ],
                ],
            ],
        ],
        'layout' => [
            'icon' => 'fa-align-center',
            'settings' => [
                'logo_and_icon' => [
                    'company_logo' => [
                        'field_type' => 'image',
                        'height' => 80,
                        'validation' => 'image|size:512',
                        'field_label' => 'Logo Dark',
                    ],
                    'company_logo_light' => [
                        'field_type' => 'image',
                        'height' => 80,
                        'validation' => 'image|size:512',
                        'field_label' => 'Logo Light',
                    ],
                    'favicon' => [
                        'field_type' => 'image',
                        'height' => 64,
                        'width' => 64,
                        'validation' => 'image|size:100',
                        'field_label' => 'Favicon',
                    ],
                ],
                'navigation' => [
                    'navigation_type' => [
                        'field_type' => 'radio',
                        'field_value' => 'navigation_type',
                        'default' => 0,
                        'field_label' => 'Visible Navigation type',
                    ],
                    'side_nav' => [
                        'field_type' => 'select',
                        'field_value' => 'side_nav_type',
                        'default' => '0',
                        'field_label' => 'Side nav Layout',
                    ],
                    'side_nav_fixed' => [
                        'field_type' => 'switch',
                        'field_value' => 'inversed_logo',
                        'default' => '0',
                        'field_label' => 'Active fixed side nav',
                    ],
                    'no_header_layout' => [
                        'field_type' => 'select',
                        'field_value' => 'no_header_layout',
                        'default' => '1',
                        'field_label' => 'No header layout type',
                    ],
                ],
                'advertise' => [
                    'home_page_popup' => [
                        'field_type' => 'switch',
                        'field_value' => 'home_page_popup',
                        'default' => '0',
                        'field_label' => 'Show Home page PopUp',
                    ],
                    'home_page_popup_img' => [
                        'field_type' => 'image',
                        'height' => 300,
                        'validation' => 'image|size:512',
                        'field_label' => 'Home Page PopUp Image',
                    ],
                ],
            ],
        ],
        'footer_settings' => [
            'icon' => 'fa-long-arrow-down',
            'settings' => [
                'contact_info' => [
                    'footer_email' => [
                        'field_type' => 'text',
                        'validation' => 'email',
                        'field_label' => 'Email',
                    ],
                    'footer_phone_number' => [
                        'field_type' => 'text',
                        'field_label' => 'Phone Number',
                    ],
                    'footer_address' => [
                        'field_type' => 'textarea',
                        'field_label' => 'Address',
                    ],
                    'footer_about' => [
                        'field_type' => 'textarea',
                        'field_label' => 'About',
                    ],
                ],
                'footer_first_menu' => [
                    'footer_menu_title_1' => [
                        'field_type' => 'text',
                        'validation' => 'required',
                        'field_label' => 'First Footer Menu Title',
                    ],
                    'footer_menu_1' => [
                        'field_type' => 'select',
                        'field_value' => 'footer_nav_list',
                        'field_label' => 'First Footer Menu',
                    ],
                ],
                'footer_second_menu' => [
                    'footer_menu_title_2' => [
                        'field_type' => 'text',
                        'validation' => 'required',
                        'field_label' => 'Second Footer Menu Title',
                    ],
                    'footer_menu_2' => [
                        'field_type' => 'select',
                        'field_value' => 'footer_nav_list',
                        'field_label' => 'Second Footer Menu',
                    ],
                ],
                'footer_third_menu' => [
                    'footer_menu_title_3' => [
                        'field_type' => 'text',
                        'validation' => 'required',
                        'field_label' => 'Third Footer Menu Title',
                    ],
                    'footer_menu_3' => [
                        'field_type' => 'select',
                        'field_value' => 'footer_nav_list',
                        'field_label' => 'Third Footer Menu',
                    ],
                ],
                'footer_copyright' => [
                    'footer_copyright_text' => [
                        'field_type' => 'textarea',
                        'field_label' => 'Copyright',
                    ],
                ],
            ],
        ],
        'dashboard_settings' => [
            'icon' => 'fa-tachometer',
            'settings' => [
                'coins' => [
                    'dashboard_coin_1' => [
                        'field_type' => 'select',
                        'field_value' => 'get_coin_list',
                        'field_label' => 'Select Dashboard First Coin',
                    ],
                    'dashboard_coin_2' => [
                        'field_type' => 'select',
                        'field_value' => 'get_coin_list',
                        'field_label' => 'Select Dashboard Second Coin',
                    ],
                    'dashboard_coin_3' => [
                        'field_type' => 'select',
                        'field_value' => 'get_coin_list',
                        'field_label' => 'Select Dashboard Third Coin',
                    ],
                    'dashboard_coin_4' => [
                        'field_type' => 'select',
                        'field_value' => 'get_coin_list',
                        'field_label' => 'Select Dashboard Fourth Coin',
                    ],
                ],
                'coin_pairs' => [
                    'dashboard_coin_pair' => [
                        'field_type' => 'select',
                        'field_value' => 'get_coin_pair_list',
                        'field_label' => 'Select One CoinPair',
                    ]
                ]
            ],
        ],
        'exchange_settings' => [
            'icon' => 'fa-exchange',
            'settings' => [
                'exchange' => [
                    'trading_price_tolerance' => [
                        'field_type' => 'text',
                        'data_type' => 'numeric',
                        'max' => '100',
                        'min' => '0',
                        'field_label' => 'Trading price tolerance in percent',
                        'field_value' => 'trading_price_tolerance',
                    ],
                    'enable_kyc_verification_in_exchange' => [
                        'field_type' => 'switch',
                        'type_function' => true,
                        'field_value' => 'active_status',
                        'field_label' => 'Enable KYC Verification',
                    ],
                    'enable_idanalyzer_kyc' => [
                        'field_type' => 'switch',
                        'type_function' => true,
                        'field_value' => 'active_idanalyzer_status',
                        'field_label' => 'Enable IDAnalyzer Verification',
                    ],
                    'idanalyzer_kyc_api' => [
                        'field_type' => 'text',
                        'field_label' => 'Restricted IDAnalyzer API',
                        'field_value' => 'idanalyzer_kyc_api',
                    ],
                    'exchange_maker_fee' => [
                        'field_type' => 'text',
                        'data_type' => 'numeric',
                        'max' => '100',
                        'min' => '0',
                        'field_label' => 'Exchange Maker Fee',
                        'field_value' => 'exchange_maker_fee',
                    ],
                    'exchange_taker_fee' => [
                        'field_type' => 'text',
                        'data_type' => 'numeric',
                        'max' => '100',
                        'min' => '0',
                        'field_label' => 'Exchange Taker Fee',
                    ],
                    'enable_thirdparty_exchange' => [
                        'field_type' => 'switch',
                        'type_function' => true,
                        'field_value' => 'active_thirdparty_exchange',
                        'field_label' => 'Enable KuCoin Exchange',
                    ],
                    'thirdparty_provider' => [
                        'field_type' => 'text',
                        'field_label' => 'Thirdparty Provider (Binance, Kucoin, etc)',
                        'field_value' => 'thirdparty_api_key',
                    ],
                    'thirdparty_api_key' => [
                        'field_type' => 'text',
                        'field_label' => 'Thirdparty Api Key',
                        'field_value' => 'thirdparty_api_key',
                    ],
                    'thirdparty_secrete_key' => [
                        'field_type' => 'text',
                        'field_label' => 'Thirdparty Secret Key',
                        'field_value' => 'thirdparty_secret_key',
                    ],
                    'thirdparty_passphrase' => [
                        'field_type' => 'text',
                        'field_label' => 'Thirdparty Passphrase',
                        'field_value' => 'thirdparty_passphrase',
                    ],
                    'enable_complete_market_anyway' => [
                        'field_type' => 'switch',
                        'type_function' => true,
                        'field_value' => 'active_complete_market_anyway',
                        'field_label' => 'Enable Complete Market Anyway',
                    ],
                    'live_chart' => [
                        'field_type' => 'switch',
                        'type_function' => true,
                        'field_value' => 'live_chart',
                        'field_label' => 'Live Charts',
                    ],
                ],
            ],
        ],
        'deposit_settings' => [
            'icon' => 'fa-money',
            'settings' => [
                'settings' => [
                    'deposit_policy_page_url' => [
                        'field_type' => 'text',
                        'field_label' => 'Policy Page URL',
                        'validation' => 'url',
                    ],
                ],
            ],
        ],
        'withdrawal_settings' => [
            'icon' => 'fa-send',
            'settings' => [
                'settings' => [
                    'is_email_confirmation_required' => [
                        'field_type' => 'switch',
                        'type_function' => true,
                        'field_value' => 'active_status',
                        'field_label' => 'Required Email Confirmation',
                    ],
                    'withdrawal_confirmation_link_expire_in' => [
                        'field_type' => 'text',
                        'field_label' => 'Email Confirmation Expire Time (Minutes)',
                        'validation' => 'numeric|min:0',
                    ],
                    'is_admin_approval_required' => [
                        'field_type' => 'switch',
                        'type_function' => true,
                        'field_value' => 'active_status',
                        'field_label' => 'Required Admin Approval',
                    ],
                    'withdrawal_policy_page_url' => [
                        'field_type' => 'text',
                        'field_label' => 'Policy Page URL',
                        'validation' => 'url',
                    ],
                ],
            ],
        ],
        'stake_settings' => [
            'icon' => 'fa-dollar',
            'settings' => [
                'settings' => [
                    'stake_policy_page_url' => [
                        'field_type' => 'text',
                        'field_label' => 'Policy Page URL',
                        'validation' => 'url',
                    ],
                ],
            ],
        ],
        'api_settings' => [
            'icon' => 'fa-globe',
            'settings' => [
                'coinpayments' => [
                    'coinpayments_private_key' => [
                        'field_type' => 'text',
                        'field_label' => 'Private Key',
                        'encryption' => true
                    ],
                    'coinpayments_public_key' => [
                        'field_type' => 'text',
                        'field_label' => 'Public Key',
                        'field_value' => 'public_key',
                        'encryption' => true
                    ],
                    'coinpayments_merchant_id' => [
                        'field_type' => 'text',
                        'field_label' => 'Merchant ID',
                        'field_value' => 'merchant_id',
                        'encryption' => true
                    ],
                    'coinpayments_ipn_secret' => [
                        'field_type' => 'text',
                        'field_label' => 'IPN Secret',
                        'field_value' => 'ipn_secret',
                        'encryption' => true
                    ],
                    'coinpayments_ch' => [
                        'field_type' => 'text',
                        'field_label' => 'CH',
                        'field_value' => 'ch',
                    ],
                ],
                'ethereum' => [
                    'ethereum_server_url' => [
                        'field_type' => 'text',
                        'field_label' => 'Ethereum Server URL',
                        'placeholder' => 'http://127.0.0.1:7545',
                        'validation' => 'required|url',
                    ],
                    'ethereum_websocket_url' => [
                        'field_type' => 'text',
                        'field_label' => 'Ethereum Websocket URL',
                        'placeholder' => 'ws://127.0.0.1:7546',
                        'validation' => 'required|url',
                    ],
                    'ethereum_blockchain_explorer' => [
                        'field_type' => 'text',
                        'field_label' => 'Ethereum Blockchain Explorer',
                    ],
                ],
                'binance' => [
                    'binance_server_url' => [
                        'field_type' => 'text',
                        'field_label' => 'Binance Server URL',
                        'placeholder' => 'http://127.0.0.1:7545',
                        'validation' => 'required|url',
                    ],
                    'binance_websocket_url' => [
                        'field_type' => 'text',
                        'field_label' => 'Binance Websocket URL',
                        'placeholder' => 'ws://127.0.0.1:7546',
                        'validation' => 'required|url',
                    ],
                    'binance_blockchain_explorer' => [
                        'field_type' => 'text',
                        'field_label' => 'Binance Blockchain Explorer',
                    ],
                ],
                'tron' => [
                    'tron_api_key' => [
                        'field_type' => 'text',
                        'field_label' => 'Tron Api Key',
                        'placeholder' => 'Your Key',
                        'validation' => 'required',
                    ]
                ],
            ],
        ],
        'bonus_settings' => [
            'icon' => 'fa-gift',
            'settings' => [
                'register_bonus' => [
                    'register_bonus_status' => [
                        'field_type' => 'switch',
                        'type_function' => true,
                        'field_label' => 'Register Bonus Status',
                        'field_value' => 'register_bonus_status',
                    ],
                    'register_bonus_symbol' => [
                        'field_type' => 'text',
                        'field_label' => 'Symbol (BTC)',
                        'field_value' => 'register_bonus_symbol',
                    ],
                    'register_bonus_amount' => [
                        'field_type' => 'text',
                        'data_type' => 'numeric',
                        'max' => '1000',
                        'min' => '0',
                        'field_label' => 'Register Bonus Amount',
                        'field_value' => 'register_bonus_amount',
                    ],
                ],
            ],
        ],
        'robot_settings' => [
            'icon' => 'fa-database',
            'settings' => [
                'order_robot' => [
                    'robot_active_status' => [
                        'field_type' => 'switch',
                        'type_function' => true,
                        'field_value' => 'robot_active_status',
                        'field_label' => 'Robot Status',
                    ],
                    'robot_time_work' => [
                        'field_type' => 'text',
                        'field_label' => 'Robot Active Time(Min)',
                        'field_value' => 'robot_time_work',
                    ],
                    'robot_time_purge' => [
                        'field_type' => 'text',
                        'field_label' => 'Robot Purge Time(Hour)',
                        'field_value' => 'robot_time_purge',
                    ],
                ],
            ],
        ],
    ],


    /*
     * ----------------------------------------
     * ----------------------------------------
     * ALL WRAPPER HERE
     * ----------------------------------------
     * ----------------------------------------
    */
    'common_wrapper' => [
        'section_start_tag' => '<div class="form-group row">',
        'section_end_tag' => '</div>',
        'slug_start_tag' => '<label for="" class="col-md-4 control-label">',
        'slug_end_tag' => '</label>',
        'value_start_tag' => '<div class="col-md-8">',
        'value_end_tag' => '</div>',
    ],
    'common_text_input_wrapper' => [
        'input_start_tag' => '',
        'input_end_tag' => '',
        'input_class' => 'form-control',
    ],
    'common_textarea_input_wrapper' => [
        'input_start_tag' => '',
        'input_end_tag' => '',
        'input_class' => 'form-control',
    ],
    'common_select_input_wrapper' => [
        'input_start_tag' => '',
        'input_end_tag' => '',
        'input_class' => 'form-control',
    ],
    'common_checkbox_input_wrapper' => [
        'input_start_tag' => '<div class="setting-checkbox">',
        'input_end_tag' => '</div>',
    ],
    'common_radio_input_wrapper' => [
        'input_start_tag' => '<div class="setting-checkbox">',
        'input_end_tag' => '</div>',
        'input_class' => 'setting-radio',
    ],
    'common_toggle_input_wrapper' => [
        'input_start_tag' => '<div class="text-right">',
        'input_end_tag' => '</div>',
    ],
];
