<?php

namespace App\Http\Controllers\V1\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\API\CheckoutRequest;
use App\Http\Resources\V1\API\OrderResources;
use App\Http\Resources\V1\API\TrainingResource;
use App\Models\Order;
use App\Models\Training;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TrainingController extends Controller
{
    public function index()
    {
        try {
            $trainings = Training::where('status', 1)->get();

            return response()->json([
                'success' => true,
                'data'    => TrainingResource::collection($trainings)
            ], 200);
        } catch (\Throwable $e) {
            // Optional: log error untuk debugging
            \Log::error('Failed to fetch trainings: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch trainings',
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $training = Training::findOrFail(decrypt($id));

            return response()->json([
                'success' => true,
                'data'    => new TrainingResource($training)
            ], 200);
        } catch (\Throwable $e) {
            \Log::error('Failed to fetch training: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch training',
            ], 500);
        }
    }

    public function checkout(CheckoutRequest $request): JsonResponse
    {
        $data = $request->validated();

        // Ambil harga training langsung dari DB
        $training = Training::findOrFail($data['training_id']);
        $price = $training->price;

        // Hitung PPN dan biaya layanan dari env
        $ppn = round($price * env('PPN', 0));        // misal 0.11 untuk 11%
        $serviceFee = env('SERVICE_FEE', 0);         // misal 5000

        $grossAmount = $price + $ppn + $serviceFee;

        // Buat order baru
        $order = Order::create([
            'customer_id'         => $data['customer_id'] ?? null,
            'training_id'         => $training->id,
            'price'               => $price,
            'status'              => 'pending',
            'user_name'           => $data['user_name'],
            'user_email'          => $data['user_email'],
            'user_phone'          => $data['user_phone'],
            'certificate_address' => $data['certificate_address'],
            'company'             => $data['company'] ?? null,
            'gender'              => $data['gender'] ?? null,
        ]);

        // Siapkan parameter untuk Midtrans Snap
        $params = [
            'transaction_details' => [
                'order_id'     => $order->order_number,
                'gross_amount' => $grossAmount,
            ],
            'customer_details' => [
                'first_name' => $data['user_name'],
                'email'      => $data['user_email'],
                'phone'      => $data['user_phone'],
            ],
            'item_details' => [
                [
                    'id'       => $training->id,
                    'price'    => $price,
                    'quantity' => 1,
                    'name'     => $training->title,
                ],
            ],
        ];

        // Tambahkan PPN dan biaya layanan di item details agar terlihat di invoice
        if ($ppn > 0) {
            $params['item_details'][] = [
                'id' => 'ppn',
                'price' => $ppn,
                'quantity' => 1,
                'name' => 'PPN',
            ];
        }

        if ($serviceFee > 0) {
            $params['item_details'][] = [
                'id' => 'service_fee',
                'price' => $serviceFee,
                'quantity' => 1,
                'name' => 'Biaya Layanan',
            ];
        }

        // Generate Snap token
        $snapToken = app(\App\Services\MidtransService::class)->createTransaction($params);

        return response()->json([
            'success'    => true,
            'message'    => 'Checkout berhasil dibuat.',
            'order'      => new OrderResources($order),
            'snap_token' => $snapToken,  // wajib untuk frontend
        ], 201);
    }

    public function notification(Request $request)
    {
        $notif = new \Midtrans\Notification();

        $order = Order::where('order_number', $notif->order_id)->first();

        if ($order) {
            if ($notif->transaction_status == 'settlement') {
                $order->update(['status' => 'paid']);
            } elseif ($notif->transaction_status == 'pending') {
                $order->update(['status' => 'pending']);
            } elseif ($notif->transaction_status == 'expire') {
                $order->update(['status' => 'expired']);
            } elseif ($notif->transaction_status == 'cancel') {
                $order->update(['status' => 'canceled']);
            }
        }

        return response()->json(['message' => 'ok']);
    }
}
