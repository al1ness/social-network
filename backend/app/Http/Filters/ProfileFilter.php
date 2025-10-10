<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ProfileFilter
{
    protected array $keys = [
        'name',
        'location'
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

    private function name(Builder $builder, $value): void
    {
        $builder->where('name', 'ilike', "%$value%");
    }

    private function location(Builder $builder, $value): void
    {
        $builder->where('location', 'ilike', "%$value%");
    }
}
