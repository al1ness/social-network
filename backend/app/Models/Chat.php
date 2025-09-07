<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
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
