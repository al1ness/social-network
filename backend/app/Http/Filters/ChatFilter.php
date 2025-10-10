<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ChatFilter
{
   protected array $keys = [
        'title'
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

   private function title(Builder $builder, $value): void
   {
       $builder->where('title', 'ilike', "%$value%");
   }
}
