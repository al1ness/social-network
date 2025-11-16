<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class CategoryFilter extends AbstractFilter
{
    protected array $keys = [
        'title'
    ];

    protected function title(Builder $builder, $value): void
    {
        $builder->where('title', 'ilike', "%$value%");
    }
}
