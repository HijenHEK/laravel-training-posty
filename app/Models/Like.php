<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    // use HasFactory, SoftDeletes;
    use HasFactory;
   
    protected $table = 'likes';
    public $timestamps = true;
    protected $fillable = ['likeable_id', 'likeable_type', 'user_id'];

    /**
     * @access private
     */
    public function likeable()
    {
        return $this->morphTo();
    }
    // protected $fillable = ['user_id','post_id'];

    // public function post() {
    //     return $this->belongsTo(Post::class);
    // }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
