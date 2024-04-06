<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\ImageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->resource->name,
            'slug' => $this->resource->slug,
            'price' => $this->resource->price,
            'discount' => $this->resource->discount,
            'discount_type' => $this->resource->discount_type,
            'images' => ImageResource::collection($this->resource->images)
        ];
    }
}
