<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class CommentFilter extends AbstractFilter
{
    protected array $keys = [
        'profile_name',
        'published_at_from',
        'published_at_to'
    ];

    protected function profileName(Builder $builder, $value): void
    {
        $builder->whereRelation('profile', 'name', 'ilike', "%$value%");
    }

    protected function publishedAtFrom(Builder $builder, $value): void
    {
        $builder->where('published_at', '>=', $value);
    }

    protected function publishedAtTo(Builder $builder, $value): void
    {
        $builder->where('published_at', '<=', $value);
    }
}
