<?php
// app/Providers/MidtransServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Midtrans\Config as MidtransConfig;

class MidtransServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Set konfigurasi Midtrans dari config/payment.php
        MidtransConfig::$serverKey    = config('payment.server_key');
        MidtransConfig::$isProduction = filter_var(config('payment.is_production', false), FILTER_VALIDATE_BOOLEAN);
        MidtransConfig::$isSanitized  = filter_var(data_get(config('payment.options'), 'is_sanitized', true), FILTER_VALIDATE_BOOLEAN);
        MidtransConfig::$is3ds        = filter_var(data_get(config('payment.options'), 'is_3ds', true), FILTER_VALIDATE_BOOLEAN);
    }
}
