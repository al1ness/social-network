<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

    public function comments(): HasManyThrough
    {
        return $this->hasManyThrough(Comment::class,
            Post::class,
            'category_id',
            'post_id',
            'id',
            'id'
        );
    }

    public function comment(): HasOneThrough
    {
        return $this->hasOneThrough(Comment::class, Post::class)->latest();
    }
}
