<?php

namespace App\Services;

use App\Models\Image;

class ImageService
{
    public static function update(Image $image, array $data): Image
    {
        $image->update($data);
        return $image->refresh();
    }
}
