<?php

namespace App\Http\Controllers\V1\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\API\CheckoutRequest;
use App\Http\Resources\V1\API\TrainingResource;
use App\Models\Order;
use App\Models\Training;
use Illuminate\Http\JsonResponse;
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

    // Detail training
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
        // Ambil data validasi
        $data = $request->validated();

        // Ambil harga training langsung dari database biar user tidak bisa manipulasi
        $training = Training::findOrFail($data['training_id']);
        $price = $training->price;

        // Buat order baru
        $order = Order::create([
            'customer_id'        => '' ,// null kalau guest
            'training_id'        => $training->id,
            'price'              => $price,
            'status'             => 'pending',

            // Data peserta
            'user_name'          => $data['user_name'],
            'user_email'         => $data['user_email'],
            'user_phone'         => $data['user_phone'],
            'certificate_address' => $data['certificate_address'],
            'company'            => $data['company'] ?? null,
            'gender'             => $data['gender'] ?? null,

            // Generate UUID unik
            'uuid'               => Str::uuid(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Checkout berhasil dibuat.',
            'order'   => $order,
        ]);
    }
}
