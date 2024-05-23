<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'folder_name'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function files(): HasMany 
    {
        return $this->hasMany(File::class);
    }

    public function suspends(): HasMany 
    {
        return $this->hasMany(Suspend::class);
    }

    public function comments(): HasMany 
    {
        return $this->hasMany(Comment::class);
    }

    public function replies(): HasMany 
    {
        return $this->hasMany(Reply::class);
    }

    public function soul_links(): HasMany 
    {
        return $this->hasMany(SoulLink::class, 'friend_user_id');
    }

    public function incoming_soul_links_requests(): HasMany 
    {
        return $this->hasMany(SoulLinksRequest::class, 'from_user_id');
    }

    public function outgoing_soul_links_requests(): HasMany 
    {
        return $this->hasMany(SoulLinksRequest::class, 'to_user_id');
    }
}
