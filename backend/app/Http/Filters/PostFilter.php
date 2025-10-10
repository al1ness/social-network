<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class PostFilter
{
    protected array $keys = [
        'category_title',
        'title',
        'published_at_from',
        'published_at_to',
        'views_from',
        'views_to'
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

    private function categoryTitle(Builder $builder, $value): void
    {
        $builder->whereRelation('category', 'title', 'ilike', "%$value%");
    }

    private function title(Builder $builder, $value): void
    {
        $builder->where('title', 'ilike', "%$value%");
    }

    private function publishedAtFrom(Builder $builder, $value): void
    {
        $builder->where('published_at', '>=', $value);
    }

    private function publishedAtTo(Builder $builder, $value): void
    {
        $builder->where('published_at', '<=', $value);
    }

    private function viewsFrom(Builder $builder, $value): void
    {
        $builder->where('views', '>=', $value);
    }

    private function viewsTo(Builder $builder, $value): void
    {
        $builder->where('views', '<=', $value);
    }
}
