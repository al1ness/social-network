<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public function taggedPosts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function taggedVideos(): MorphToMany
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
