<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

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
            'post.title' => 'required|string|unique:posts,title,' . $this->post['id'],
            'post.body' => 'required|string',
            'post.category_id' => 'required|integer|exists:categories,id',
            'post.profile_id' => 'required|integer|exists:profiles,id',
            'post.views' => 'required|integer',
            'post.status' => 'required|integer',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp',
            'tags' => 'nullable|string'
        ];
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'post' => [
                ...$this->post,
                'profile_id' => auth()->user()->profile->id,
                'views' => 0,
                'status' => 0
            ]
        ]);
    }
}
