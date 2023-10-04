<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likePosts() : BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'likes')->withTimestamps();
    }

    public function likes($post_id)
    {
        return $this->likePosts()->where('post_id', $post_id)->exists();
    }

    public function like($post_id)
    {
        if(!$this->likes($post_id)) {
            $this->likePosts()->attach($post_id);
        }
    }

    public function unLike($post_id)
    {
        if($this->likes($post_id)) {
            $this->likePosts()->detach($post_id);
        }
    }
}
