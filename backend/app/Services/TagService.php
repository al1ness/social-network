<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Tag;

class TagService
{
    public static function update(Tag $tag, array $data): Tag
    {
        $tag->update($data);
        return $tag->refresh();
    }

    public static function storeBatch(string $tags): array
    {
        if (empty($tags)) return [];

        $tagsArr = explode(',', $tags);
        $tags = [];

        foreach ($tagsArr as $tagTitle) {
            $tagTitle = trim($tagTitle);

            if (!empty($tagTitle)) {
                $tags[] = Tag::firstOrCreate([
                    'title' => $tagTitle
                ]);
            }
        }

        return $tags;
    }
}
