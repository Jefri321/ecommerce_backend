<?php

namespace App\Http\Controllers\V1\API;

use App\Http\Controllers\Controller;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use App\Models\Order;

class PaymentController extends Controller
{
    public function __construct(private MidtransService $midtrans) {}

    /**
     * Generate Snap token untuk frontend
     */
    public function checkout(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'training_id' => 'required|exists:trainings,id',
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'required|string|max:20',
            'amount'      => 'required|numeric|min:1',
            'certificate_address' => 'required|string',
            'company'     => 'nullable|string|max:255',
            'gender'      => 'nullable|in:Laki-laki,Perempuan',
        ]);

        // Buat order di DB
        $order = Order::create([
            'customer_id'        => null, // bisa diisi jika user login
            'training_id'        => $validated['training_id'],
            'price'              => $validated['amount'],
            'status'             => 'pending',
            'user_name'          => $validated['name'],
            'user_email'         => $validated['email'],
            'user_phone'         => $validated['phone'],
            'certificate_address' => $validated['certificate_address'],
            'company'            => $validated['company'] ?? null,
            'gender'             => $validated['gender'] ?? null,
        ]);

        // Siapkan parameter Midtrans
        $params = [
            'transaction_details' => [
                'order_id'     => $order->id,
                'gross_amount' => $order->price,
            ],
            'customer_details' => [
                'first_name' => $order->user_name,
                'email'      => $order->user_email,
                'phone'      => $order->user_phone,
            ],
        ];

        // Generate Snap token
        $snapToken = $this->midtrans->createTransaction($params);

        return response()->json([
            'success'    => true,
            'snap_token' => $snapToken,
            'client_key' => config('payment.client_key'),
            'order'      => $order,
        ]);
    }
    /**
     * Terima notification dari Midtrans
     */
    public function notification(Request $request)
    {
        try {
            // Handle notification lewat service (validasi signature)
            $status = $this->midtrans->handleNotification($request->all());

            $orderId = $request->order_id;
            $order = Order::find($orderId);

            if ($order) {
                $order->payment_status = $status; // success / pending / failed
                $order->save();
            }

            return response()->json(['message' => 'OK']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }
}
