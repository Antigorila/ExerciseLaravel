<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'folder_name', 'description', 'content', 'user_id'];

    public function user():BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function suspends(): HasMany 
    {
        return $this->hasMany(Suspend::class);
    }

    public function comments(): HasMany 
    {
        return $this->hasMany(Comment::class);
    }
}