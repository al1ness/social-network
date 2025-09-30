<?php

namespace App\Models;

use App\Models\Traits\HasLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasLog;

    //    protected static function booted(): void
//    {
//        static::created(function ($model) {
//            Log::create([
//                'model_name' => get_class($model),
//                'event_name' => "Post created id-{$model->id}",
//                'old_fields' => 1
//            ]);
//        });
//    }

    protected $guarded = false;

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

    public function comments(): HasManyThrough
    {
        return $this->hasManyThrough(
            Comment::class,
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
