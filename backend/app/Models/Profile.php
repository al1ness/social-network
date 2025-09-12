<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function chats(): BelongsToMany
    {
        return $this->belongsToMany(Chat::class, 'chat_profile');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(Follow::class, 'follows', 'follower_id', 'following_id');
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class, 'follows', 'following_id', 'follower_id');
    }

    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'profile_tag');
    }
}
