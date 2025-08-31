<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Comment;

class CommentService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function update(Comment $comment, array $data): Comment
    {
        $comment->update($data);
        return $comment->refresh();
    }
}
