<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follow extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFilter;

    protected $guarded = false;

    public function follower(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'follower_id');
    }

    public function following(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'following_id');
    }
}
