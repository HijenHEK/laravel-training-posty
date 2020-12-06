<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LikeController extends Controller
{
    //


    public function __construct()
    {
        return $this->middleware('auth');
    }


    public function index(Post $post) {
        return [$post->likes()->get(),Auth::user() ? Auth::user()->like($post) : null] ;
    }
    public function store(Post $post){
        

        if(Request()->user()->like($post)){
            return response(null , 409);
        }

        $post->likes()->create([
            "user_id" => Auth::id()
        ]);

        // if(! $post->likes()->onlyTrashed()->where('user_id' , auth()->id())->count()) {
        //     Mail::to($post->user)->send(new PostLiked(Auth::user() , $post));

        // } ;

        // return back();

    }

    public function destroy(Post $post){
        if(!Request()->user()->like($post)){
            return response(null , 409);
        }
        $post->likes->where("user_id" , Auth::id())->first()->delete();
        // return back();
    }
}
