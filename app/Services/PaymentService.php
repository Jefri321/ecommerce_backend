<?php

namespace App\Services;

use Midtrans\Snap;
use Midtrans\Transaction;

class PaymentService
{
    public function __construct()
    {
        // Set konfigurasi Midtrans di sini
        \Midtrans\Config::$serverKey    = config('payment.server_key');
        \Midtrans\Config::$isProduction = config('payment.is_production');
        \Midtrans\Config::$isSanitized  = config('payment.options.is_sanitized');
        \Midtrans\Config::$is3ds        = config('payment.options.is_3ds');
    }

    /**
     * Generate Snap Token untuk checkout
     */
    public function createSnapToken(array $params): string
    {
        return Snap::getSnapToken($params);
    }

    /**
     * Validasi Signature Key dari Midtrans Notification
     */
    public function validateSignature(array $payload): bool
    {
        $expectedSignature = hash('sha512',
            $payload['order_id'] .
            $payload['status_code'] .
            $payload['gross_amount'] .
            config('payment.server_key')
        );

        return $expectedSignature === ($payload['signature_key'] ?? '');
    }

    /**
     * Proses notifikasi dan kembalikan status
     */
    public function handleNotification(array $payload): string
    {
        if (! $this->validateSignature($payload)) {
            throw new \Exception('Invalid signature');
        }

        // Tentukan status transaksi
        $transactionStatus = $payload['transaction_status'];
        $fraudStatus       = $payload['fraud_status'] ?? null;

        switch ($transactionStatus) {
            case 'capture':
                if ($fraudStatus == 'challenge') {
                    return 'challenge';
                } elseif ($fraudStatus == 'accept') {
                    return 'success';
                }
                break;

            case 'settlement':
                return 'success';

            case 'pending':
                return 'pending';

            case 'deny':
            case 'expire':
            case 'cancel':
                return 'failed';
        }

        return 'unknown';
    }
}
