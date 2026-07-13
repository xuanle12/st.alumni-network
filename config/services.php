<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
     'mysso' => [
    'client_id' => env('SSO_CLIENT_ID'),
    'client_secret' => env('SSO_CLIENT_SECRET'),
    'redirect' => env('SSO_REDIRECT_URI'),
    'base_url' => env('SSO_BASE_URL'),
    'userinfo_url' => env('SSO_USERINFO_URL'),
],

    // API danh sách cựu sinh viên (đồng bộ về bảng ds_csv)
    'alumni' => [
        'url'        => env('ALUMNI_API_URL'),
        'token'      => env('ALUMNI_API_TOKEN'),
        // Khóa chứa mảng dữ liệu trong JSON trả về (vd: "data"). Để trống nếu API trả thẳng mảng.
        'data_key'   => env('ALUMNI_API_DATA_KEY', 'data'),
        // Tắt kiểm tra SSL nếu API dùng chứng chỉ tự ký (vd cổng :6891 của trường)
        'verify_ssl' => env('ALUMNI_API_VERIFY_SSL', true),
        'timeout'    => env('ALUMNI_API_TIMEOUT', 30),
    ],

];
