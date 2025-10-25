<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Post;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        Log::create([
            'model' => Post::class,
            'event' => "Create post id-{$post->id}",
            'new_fields' => json_encode($post->getDirty(), JSON_UNESCAPED_UNICODE)
        ]);
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        $dirtyFields = $post->getDirty();
        $oldValues = [];

        foreach ($dirtyFields as $field => $newValue) {
            $oldValues[$field] = $post->getOriginal($field);
        }

        Log::create([
            'model' => Post::class,
            'event' => "Updated post id-{$post->id}",
            'old_fields' => json_encode($oldValues, JSON_UNESCAPED_UNICODE),
            'new_fields' => json_encode($dirtyFields, JSON_UNESCAPED_UNICODE)
        ]);
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        Log::create([
            'model' => Post::class,
            'event' => "Delete post id-{$post->id}"
        ]);
    }

    /**
     * Handle the Post "retrieved" event.
     */
    public function retrieved(Post $post): void
    {
        Log::create([
            'model' => Post::class,
            'event' => "Retrieved post id-{$post->id}"
        ]);
    }
}
