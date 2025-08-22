<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyMidtransIP
{
    public function handle(Request $request, Closure $next)
    {
        $allowedIps = config('payment.notification.accepted_ips', []);
        $clientIp = $request->ip();

        if (!empty($allowedIps) && !in_array($clientIp, $allowedIps)) {
            return response()->json(['message' => 'Forbidden IP'], 403);
        }

        return $next($request);
    }
}
