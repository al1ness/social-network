<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public static function update(Category $category, array $data): Category
    {
        $category->update($data);
        return $category->refresh();
    }
}
