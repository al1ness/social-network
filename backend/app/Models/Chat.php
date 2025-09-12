<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public function profiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class, 'chat_profile');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
