<?php

namespace App\Http\Resources\V1\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id'          => encrypt($this->id),
            'title'       => $this->title,
            'description' => $this->description,
            'price'       => $this->price,
            'start_date'  => $this->start_date,
            'end_date'    => $this->end_date,
            'start_time'  => $this->start_time,
            'end_time'    => $this->end_time,
            'location'    => $this->location,
            'address'     => $this->address,
            'map_url'     => $this->map_url,
            'image'       => $this->image
                ? url('storage/' . $this->image)
                : null,
            'status'      => (bool) $this->status,
            'created_at'  => $this->created_at?->toDateTimeString(),
            'updated_at'  => $this->updated_at?->toDateTimeString(),
        ];
    }
}
