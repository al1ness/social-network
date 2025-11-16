<?php

namespace App\Exceptions\Post;

use App\Models\Post;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class PostException extends Exception
{
    public function __construct(
        private Post $post,
        string $message = "",
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Report the exception.
     */
    public function report(): void
    {
        Log::channel('posts')->error("Post operation failed: {$this->message}", [
            'post_id' => $this->post->id,
            'exception' => get_class($this),
            'code' => $this->code
        ]);
    }

    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request): JsonResponse
    {
        return response()->json([
            'error' => [
                'message' => $this->message,
                'type' => class_basename($this),
                'post_id' => $this->post->id,
                'code' => $this->code
            ]
        ], $this->code);
    }
}
