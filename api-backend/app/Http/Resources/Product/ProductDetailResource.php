<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\CommentResource;
use App\Http\Resources\ImageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
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
            'store_id' => $this->resource->store_id,
            'category' => $this->resource->category->name,
            'name' => $this->resource->name,
            'price' => $this->resource->price,
            'discount' => $this->resource->discount,
            'discount_type' => $this->resource->discount_type,
            'quantity' => $this->resource->quantity,
            'description' => $this->resource->description,
            'brand' => $this->resource->brand,
            'warranty' => $this->resource->warranty,
            'warranty_type' => $this->resource->warranty_type,
            'city' => $this->resource->city->name,
            'images' => ImageResource::collection($this->resource->images),
            'variants' => ProductVariantResource::collection($this->resource->product_variants),
            'comments' => CommentResource::collection($this->resource->comments)
        ];
    }
}
