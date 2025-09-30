<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'profile_id' => 'required|integer|exists:profiles,id',
            'category_id' => 'required|integer|exists:categories,id',
            'title' => 'required|string',
            'image_url' => 'nullable|string',
            'video_url' => 'nullable|string',
            'body' => 'required|string',
            'published_at' => 'nullable|date_format:Y-m-d',
            'status' => 'nullable|integer'
        ];
    }
}
