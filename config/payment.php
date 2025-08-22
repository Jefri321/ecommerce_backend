<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Credentials
    |--------------------------------------------------------------------------
    | Semua kredensial WAJIB diisi via .env (jangan hardcode di repo).
    */
    'merchant_id'  => env('MIDTRANS_MERCHANT_ID'),
    'client_key'   => env('MIDTRANS_CLIENT_KEY'),
    'server_key'   => env('MIDTRANS_SERVER_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Environment
    |--------------------------------------------------------------------------
    | is_production=false => Sandbox
    | is_production=true  => Live
    */
    'is_production' => (bool) env('MIDTRANS_IS_PRODUCTION', false),

    /*
    |--------------------------------------------------------------------------
    | Base URLs (Snap & API)
    |--------------------------------------------------------------------------
    | Otomatis switch sandbox/live sesuai is_production.
    */
    'snap_base_url' => env('MIDTRANS_IS_PRODUCTION', false)
        ? 'https://app.midtrans.com/snap/snap.js'
        : 'https://app.sandbox.midtrans.com/snap/snap.js',

    'api_base_url' => env('MIDTRANS_IS_PRODUCTION', false)
        ? 'https://api.midtrans.com/v2/'
        : 'https://api.sandbox.midtrans.com/v2/',

    /*
    |--------------------------------------------------------------------------
    | Default Options
    |--------------------------------------------------------------------------
    */
    'options' => [
        'is_sanitized' => true,   // Bersihkan/validasi param (saran Midtrans)
        'is_3ds'       => true,   // Aktifkan 3DS untuk kartu kredit
        // Tambahan param opsional lain bisa ditaruh di sini bila perlu.
    ],

    /*
    |--------------------------------------------------------------------------
    | HTTP Client
    |--------------------------------------------------------------------------
    */
    'http' => [
        'timeout' => (int) env('MIDTRANS_HTTP_TIMEOUT', 15), // detik
    ],

    /*
    |--------------------------------------------------------------------------
    | Logging
    |--------------------------------------------------------------------------
    | Gunakan channel Laravel (stack/single/daily). Jangan log server_key.
    */
    'log' => [
        'enabled' => (bool) env('MIDTRANS_LOG', true),
        'channel' => env('MIDTRANS_LOG_CHANNEL', 'stack'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Notification / Webhook
    |--------------------------------------------------------------------------
    | Midtrans mengirim notifikasi ke endpoint kamu.
    | - callback_url: URL relatif (akan digabung dengan APP_URL) atau absolut.
    | - signature verification dilakukan di controller (lihat contoh di docs/controller).
    | - Optional: batasi IP jika ingin whitelisting.
    */
    'notification' => [
        'callback_url' => env('MIDTRANS_NOTIFICATION_URL', '/api/midtrans/notification'),
        // Kosongkan jika tidak pakai IP whitelist. Jika ingin, isi dengan CSV.
        // Contoh: "103.208.21.14,103.208.21.15"
        'accepted_ips' => array_filter(array_map('trim', explode(',', env('MIDTRANS_ACCEPTED_IPS', '')))),
    ],

    /*
    |--------------------------------------------------------------------------
    | Currency
    |--------------------------------------------------------------------------
    */
    'currency' => env('MIDTRANS_CURRENCY', 'IDR'),
];
