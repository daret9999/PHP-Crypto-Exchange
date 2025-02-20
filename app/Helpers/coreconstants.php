<?php

//Pagination Constants
const PAGINATION_PAGE_NAME = 'p';
const PAGINATION_ITEM_PER_PAGE = 15;
const PAGINATION_EACH_SIDE = 2;
const TRADE_HISTORY_PER_PAGE = 50;
const MY_OPEN_ORDER_PER_PAGE = 10;

//Pre-defined roles
const USER_ROLE_ADMIN = 'admin';
const USER_ROLE_OPERATOR = 'operator';
const USER_ROLE_CMS = 'cms';
const USER_ROLE_EDITOR = 'editor';
const USER_ROLE_USER = 'user';

//Response keys
const RESPONSE_STATUS_KEY = 'success';
const RESPONSE_MESSAGE_KEY = 'message';
const RESPONSE_DATA = 'data';
const RESPONSE_LOCALE_KEY = 'locale';

//Response Types
const RESPONSE_TYPE_SUCCESS = 'success';
const RESPONSE_TYPE_WARNING = 'warning';
const RESPONSE_TYPE_ERROR = 'error';


//Route Permission Constants
const ROUTE_GROUP_READER_ACCESS = 'reader_access';
const ROUTE_GROUP_CREATION_ACCESS = 'creation_access';
const ROUTE_GROUP_MODIFIER_ACCESS = 'modifier_access';
const ROUTE_GROUP_DELETION_ACCESS = 'deletion_access';
const ROUTE_GROUP_FULL_ACCESS = 'full_access';
const ROUTE_TYPE_AVOIDABLE_MAINTENANCE = 'avoidable_maintenance_routes';
const ROUTE_TYPE_AVOIDABLE_UNVERIFIED = 'avoidable_unverified_routes';
const ROUTE_TYPE_AVOIDABLE_INACTIVE = 'avoidable_suspended_routes';
const ROUTE_TYPE_FINANCIAL = 'financial_routes';
const ROUTE_TYPE_GLOBAL = 'global_routes';

//Error Pages
const ROUTE_REDIRECT_TO_UNAUTHORIZED = '401';
const ROUTE_REDIRECT_TO_UNDER_MAINTENANCE = 'under_maintenance';
const ROUTE_REDIRECT_TO_EMAIL_UNVERIFIED = 'email_unverified';
const ROUTE_REDIRECT_TO_ACCOUNT_SUSPENDED = 'account_suspended';
const ROUTE_REDIRECT_TO_FINANCIAL_ACCOUNT_SUSPENDED = 'financial_account_suspended';
const REDIRECT_ROUTE_TO_USER_AFTER_LOGIN = 'profile.index';
const REDIRECT_ROUTE_TO_LOGIN = 'login';

const MENU_TYPE_ROUTE = 'route';
const MENU_TYPE_LINK = 'link';
const MENU_TYPE_PAGE = 'page';


//Boolean Status
const ACTIVE = 1;
const INACTIVE = 0;
const VERIFIED = 1;
const UNVERIFIED = 0;
const ENABLE = 1;
const DISABLE = 0;

//direction
const PAGE_DIRECTION_LEFT_TO_RIGHT = 'ltr';
const PAGE_DIRECTION_RIGHT_TO_LEFT = 'rtl';

//All Types Of Status
const STATUS_INACTIVE = 'inactive';
const STATUS_ACTIVE = 'active';
const STATUS_DELETED = 'deleted';
const STATUS_COMPLETED = 'completed';
const STATUS_CANCELED = 'canceled';
const STATUS_CANCELING = 'canceling';
const STATUS_VERIFIED = 'verified';
const STATUS_UNVERIFIED = 'unverified';
const STATUS_REVIEWING = 'reviewing';
const STATUS_PENDING = 'pending';
const STATUS_DECLINED = 'declined';
const STATUS_WAITING = 'waiting';
const STATUS_EXPIRED = "expired";
const STATUS_FAILED = "failed";
const STATUS_OPEN = "open";
const STATUS_PROCESSING = "processing";
const STATUS_RESOLVED = "resolved";
const STATUS_CLOSED = "close";
const STATUS_EMAIL_SENT = "email_sent";

//System Notice Visible Types
const NOTICE_VISIBLE_TYPE_PUBLIC = "public";
const NOTICE_VISIBLE_TYPE_PRIVATE = "private";

// currencies
const COIN_TYPE_FIAT = "fiat";
const COIN_TYPE_CRYPTO = "crypto";
const COIN_TYPE_ERC20 = "erc20";
const COIN_TYPE_TRC20 = "trc20";
const COIN_TYPE_TRC10 = "trc10";
const COIN_TYPE_BEP20 = "bep20";

//APIs
const API_COINPAYMENT = "CoinpaymentsApi";
const API_BITCOIN = "BitcoinForkedApi";
const API_BANK = "BankApi";
const API_ADVCASH = "ADVCashApi";
const API_VANDAR = "VandarApi";
const API_PAYIR = "PayirApi";
const API_MELLAT = "MellatApi";
const API_IDPAY = "IdpayApi";
const API_ZARINPAL = "ZarinpalApi";
const API_PAYPAL = "PaypalApi";
const API_ETHEREUM = "EthereumApi";
const API_ERC20 = "ERC20Api";
const API_BINANCE = "BinanceApi";
const API_BEP20 = "BEP20Api";
const API_OMNI_LAYER = "OmniLayerApi";
const API_TRC20 = "TRC20Api";
const API_TRC10 = "TRC10Api";
const API_TRON = "TronApi";
const API_INTERNAL = "Internal";

// KYC types
const KYC_TYPE_PASSPORT = 'passport';
const KYC_TYPE_NID = 'national_id';
const KYC_TYPE_DRIVING_LICENSE = 'driving_license';
const KYC_ID_ANALYZER = 'id_analyzer';

// Order types
const ORDER_TYPE_BUY = 'buy';
const ORDER_TYPE_SELL = 'sell';

// Order categories
const ORDER_CATEGORY_LIMIT = 'limit';
const ORDER_CATEGORY_MARKET = 'market';
const ORDER_CATEGORY_STOP_LIMIT = 'stop_limit';

//Fee types
const FEE_TYPE_FIXED = 'fixed';
const FEE_TYPE_PERCENT = 'percent';

// Transaction fee
const MINIMUM_TRANSACTION_FEE_CRYPTO = '0.00000001';
const MINIMUM_TRANSACTION_FEE_FIAT = '0.01';
const TRANSACTION_TYPE_BALANCE_INCREMENT = 1;
const TRANSACTION_TYPE_BALANCE_DECREMENT = 2;

//Transaction Type
const TRANSACTION_DEPOSIT = 'deposit';
const TRANSACTION_WITHDRAWAL = 'withdrawal';

//coin icon slugs
const COIN_ICON_EXTENSION = '.png';

const PRODUCT_VERIFIER_URL = 'https://verifier.codemen.me/api/product-verify';

const MOBILE = 'Mobile';
const WEB = 'Web';
