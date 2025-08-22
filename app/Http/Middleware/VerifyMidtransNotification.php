<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyMidtransNotification
{
    public function handle(Request $request, Closure $next)
    {
        $payload = $request->all();

        $allowedIps = config('payment.notification.accepted_ips', []);
        $clientIp = $request->ip();

        if (!empty($allowedIps) && !in_array($clientIp, $allowedIps)) {
            return response()->json(['message' => 'Forbidden IP'], 403);
        }

        if (!isset($payload['signature_key'], $payload['order_id'], $payload['status_code'], $payload['gross_amount'])) {
            return response()->json(['message' => 'Invalid payload'], 400);
        }

        $signature = hash('sha512',
            $payload['order_id'] .
            $payload['status_code'] .
            $payload['gross_amount'] .
            config('payment.server_key')
        );

        if ($payload['signature_key'] !== $signature) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // Jika lolos, lanjut ke controller
        return $next($request);
    }
}
