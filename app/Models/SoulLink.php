<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SoulLink extends Model
{
    use HasFactory;

    public function user():BelongsTo 
    {
        return $this->belongsTo(User::class, 'current_user_id');
    }

    public function friend():BelongsTo 
    {
        return $this->belongsTo(User::class, 'friend_user_id');
    }
}
