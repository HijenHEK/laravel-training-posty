<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class) ;
    }
    // public function comment(){
    //     return $this->belogsTo(Comment::class) ;
    // }
    // public function comments(){
    //     return $this->hasMany(Comment::class) ;
    // }
}