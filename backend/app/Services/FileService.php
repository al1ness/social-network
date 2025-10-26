<?php

namespace App\Services;

use App\Models\File;

class FileService
{
    public static function update(File $file, array $data): File
    {
        $file->update($data);
        return $file->refresh();
    }
}
