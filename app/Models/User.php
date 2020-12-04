<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function like(Post $p) {
        return $this->likes->contains('post_id' , $p->id);
    }
    public function recievedLikes(){
        return $this->hasManyThrough(Like::class , Post::class);
    }
    public function following(){
        return $this->belongsToMany(User::class , 'follow' , 'user_id' , 'following_id');
    }
    public function followers(){
        return $this->belongsToMany(User::class , 'follow' , 'following_id' ,  'user_id');
    }
    public function isFollowing(User $user=null , User $u ) {
        $user = $user ? $user : $this;
        return $user->following()->where('following_id' , $u->id)->exists;
    }
    public function follow(User $user) {
        $this->following()->attach($user);
    }
    public function unfollow(User $user) {
        $this->following()->detach($user);
    }
}
