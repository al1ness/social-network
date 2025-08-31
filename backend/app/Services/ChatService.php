<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Chat;

class ChatService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function update(Chat $chat, array $data): Chat
    {
        $chat->update($data);
        return $chat->refresh();
    }
}
