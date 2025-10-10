<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class CommentFilter
{
    protected array $keys = [
        'profile_name',
        'published_at_from',
        'published_at_to'
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

    private function profileName(Builder $builder, $value): void
    {
        $builder->whereRelation('profile', 'name', 'ilike', "%$value%");
    }

    private function publishedAtFrom(Builder $builder, $value): void
    {
        $builder->where('published_at', '>=', $value);
    }

    private function publishedAtTo(Builder $builder, $value): void
    {
        $builder->where('published_at', '<=', $value);
    }
}
