<?php

namespace App\Http\Resources\Store;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreDetailResource extends JsonResource
{
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'email' => $this->resource->user->email,
            'username' => $this->resource->user->name,
            'image' => $this->resource->image,
            'phone' => $this->resource->user->phone,
            'gender' => $this->resource->user->gender,
            'name' => $this->resource->name,
            'city_id' => $this->resource->city->id,
            'district_id' => $this->resource->district->id,
            'address' => $this->resource->address,
            'image' => $this->resource->image
        ];
    }
}
