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
        return $this->likes()->where('likeable_id' , $p->id)->where('likeable_type' , 'App\Models\Post')->exists();
    }
    public function recievedLikes(){
        // return $this->posts->map->likes()->count();
        return $this->posts->map->likes->collapse()->count();
    }
    public function feed(){
        $following = $this->following()->pluck('following_id') ;
        return Post::whereIn('user_id', $following)
                    ->orWhere('user_id', $this->id)
                    ->with(['user','likes','comments'])
                    ->latest()
                    ->paginate(10);
    }
    public function following(){
        return $this->belongsToMany(User::class , 'follow' , 'user_id' , 'following_id');
    }
    public function followers(){
        return $this->belongsToMany(User::class , 'follow' , 'following_id' ,  'user_id');
    }
    public function isFollowing(User $user ) {
        return $this->following->contains($user);
    }
    public function follow(User $user) {
        $this->following()->attach($user);
    }
    public function unfollow(User $user) {
        $this->following()->detach($user);
    }
}
