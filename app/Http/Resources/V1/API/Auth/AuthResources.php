<?php

namespace App\Http\Resources\V1\API\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                  => encrypt($this->id),
            'full_name'           => $this->full_name,
            'email'               => $this->email,
            'phone'               => $this->phone,
            'gender'              => $this->gender,
            'address'             => $this->address,
            'certificate_address' => $this->certificate_address,
            'company'             => $this->company,
            'profile_photo'       => $this->profile_photo,
            'created_at'          => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at'          => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}
