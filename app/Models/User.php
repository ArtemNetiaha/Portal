<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enams\UserRoles;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'role'
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
        'role'=>UserRoles::class,
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function readers(): BelongsToMany
    {
        return $this->belongsToMany(User::class,
            'author_reader',
            'author_id',
            'reader_id');
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(User::class,
            'author_reader',
            'reader_id',
            'author_id');
    }
    public function reactions(): HasMany
    {
        return $this->hasMany(Reactions::class);
    }

    public function isAdmin():bool
    {
        return $this->role->value==UserRoles::Admin->value;
    }
    public function isUser():bool
    {
        return !$this->isAdmin();
    }
}
