<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ProfileFilter extends AbstractFilter
{
    protected array $keys = [
        'name',
        'location'
    ];

    protected function name(Builder $builder, $value): void
    {
        $builder->where('name', 'ilike', "%$value%");
    }

    protected function location(Builder $builder, $value): void
    {
        $builder->where('location', 'ilike', "%$value%");
    }
}
