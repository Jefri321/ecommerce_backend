<?php

namespace App\Services;

use Midtrans\Snap;
use Midtrans\Notification;

class MidtransService
{
    public function createTransaction(array $params): string
    {
        return Snap::getSnapToken($params);
    }

    public function handleNotification(array $payload): string
    {
        // signature validation
        $signature = hash(
            'sha512',
            $payload['order_id'] .
                $payload['status_code'] .
                $payload['gross_amount'] .
                config('payment.server_key')
        );

        if (($payload['signature_key'] ?? '') !== $signature) {
            throw new \Exception('Invalid signature');
        }

        // mapping transaction status
        return match ($payload['transaction_status']) {
            'capture' => ($payload['fraud_status'] ?? '') === 'challenge' ? 'challenge' : 'success',
            'settlement' => 'success',
            'pending' => 'pending',
            'deny', 'expire', 'cancel' => 'failed',
            default => 'unknown',
        };
    }
}
