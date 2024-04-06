<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'rating' => $this->resource->rating,
            'content' => $this->resource->content,
            'username' => $this->resource->user->name,
            'avatar' => $this->resource->user->store->image,
            'created_at' => $this->resource->created_at,
            'images' => CommentImageResource::collection($this->resource->comment_images)
        ];
    }
}
