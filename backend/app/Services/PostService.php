<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function update(Post $post, array $data): Post
    {
        $post->update($data);
        return $post->refresh();
    }
}
