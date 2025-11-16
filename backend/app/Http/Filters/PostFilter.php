<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class PostFilter extends AbstractFilter
{
    protected array $keys = [
        'category_title',
        'title',
        'published_at_from',
        'published_at_to',
        'views_from',
        'views_to'
    ];

    protected function categoryTitle(Builder $builder, $value): void
    {
        $builder->whereRelation('category', 'title', 'ilike', "%$value%");
    }

    protected function title(Builder $builder, $value): void
    {
        $builder->where('title', 'ilike', "%$value%");
    }

    protected function publishedAtFrom(Builder $builder, $value): void
    {
        $builder->where('published_at', '>=', $value);
    }

    protected function publishedAtTo(Builder $builder, $value): void
    {
        $builder->where('published_at', '<=', $value);
    }

    protected function viewsFrom(Builder $builder, $value): void
    {
        $builder->where('views', '>=', $value);
    }

    protected function viewsTo(Builder $builder, $value): void
    {
        $builder->where('views', '<=', $value);
    }
}
