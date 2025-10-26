<?php

namespace App\Services;

use App\Models\Video;

class VideoService
{
    public static function update(Video $video, array $data): Video
    {
        $video->update($data);
        return $video->refresh();
    }
}
