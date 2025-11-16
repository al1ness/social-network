<?php

declare(strict_types=1);

namespace App\Http\Resources\Post;

use App\Http\Resources\Image\ImageResource;
use App\Http\Resources\Tag\TagResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'profile_id' => $this->profile_id,
            'category_id' => $this->category_id,
            'title' => $this->title,
            'body' => $this->body,
            'published_at' => $this->published_at,
            'views' => $this->views,
            'status' => $this->status,
            'images' => ImageResource::collection($this->images)->resolve(),
            'tags_as_string' => $this->tags_as_string
        ];
    }
}

