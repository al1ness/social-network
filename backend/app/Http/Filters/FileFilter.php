<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class FileFilter extends AbstractFilter
{
    protected array $keys = [
        'profile_name'
    ];

    protected function profileName(Builder $builder, $value): void
    {
        $builder->whereRelation('profile', 'name', 'ilike', "%$value%");
    }
}
