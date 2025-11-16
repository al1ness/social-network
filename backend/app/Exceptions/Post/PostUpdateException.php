<?php

namespace App\Exceptions\Post;

use App\Models\Post;
use Exception;

class PostUpdateException extends PostException
{
    public function __construct(Post $post, string $message = "Failed to update post")
    {
        parent::__construct($post, $message, 500);
    }
}
