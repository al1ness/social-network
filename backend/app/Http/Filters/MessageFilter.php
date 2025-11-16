<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class MessageFilter extends AbstractFilter
{
    protected array $keys = [
        'chat_title',
        'sender_name',
        'message_status'
    ];

    protected function chatTitle(Builder $builder, $value): void
    {
        $builder->whereRelation('chat', 'title', 'ilike', "%$value%");
    }

    protected function senderName(Builder $builder, $value): void
    {
        $builder->whereRelation('profile', 'name', 'ilike', "%$value%");
    }

    protected function messageStatus(Builder $builder, $status): void
    {
        match($status) {
            'read' => $builder->whereNotNull('read_at'),
            'unread' => $builder->whereNull('read_at'),
            default => null
        };
    }
}
