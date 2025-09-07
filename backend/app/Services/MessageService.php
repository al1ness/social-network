<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Message;

class MessageService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function update(Message $message, array $data): Message
    {
        $message->update($data);
        return $message->refresh();
    }
}
