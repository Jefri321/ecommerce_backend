<?php

namespace App\Http\Resources\V1\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid'                => $this->uuid,
            'training_id'         => $this->training_id,
            'customer_id'         => $this->customer_id,
            'price'               => $this->price,
            'status'              => $this->status,
            'user_name'           => $this->user_name,
            'user_email'          => $this->user_email,
            'user_phone'          => $this->user_phone,
            'certificate_address' => $this->certificate_address,
            'company'             => $this->company,
            'gender'              => $this->gender,
            'created_at'          => $this->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}
