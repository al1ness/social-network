<?php

namespace App\Http\Resources\File;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
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
            'fileable_type' => $this->fileable_type,
            'fileable_id' => $this->fileable_id,
            'name' => $this->name,
            'file_path' => $this->file_path
        ];
    }
}
