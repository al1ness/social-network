<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class MessageFilter
{
    protected array $keys = [
        'chat_title',
        'sender_name',
        'message_status'
    ];

    public function apply(Builder $builder, array $data): Builder
    {
        foreach ($this->keys as $key) {
            if (isset($data[$key])) {

                $methodName = Str::camel($key);
                $this->$methodName($builder, $data[$key]);
            }
        }

        return $builder;
    }

    private function chatTitle(Builder $builder, $value): void
    {
        $builder->whereRelation('chat', 'title', 'ilike', "%$value%");
    }

    private function senderName(Builder $builder, $value): void
    {
        $builder->whereRelation('profile', 'name', 'ilike', "%$value%");
    }

    private function messageStatus(Builder $builder, $status): void
    {
        match($status) {
            'read' => $builder->whereNotNull('read_at'),
            'unread' => $builder->whereNull('read_at'),
            default => null
        };
    }
}
