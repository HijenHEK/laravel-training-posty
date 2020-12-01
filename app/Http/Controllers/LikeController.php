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

    public function store(Post $post){

        if(Request()->user()->like($post)){
            return response(null , 409);
        }

        $post->likes()->create([
            "user_id" => Auth::id()
        ]);

        Mail::to($post->user)->send(new PostLiked(Auth::user() , $post));


        return back();

    }

    public function destroy(Post $post){
        $post->likes->where("user_id" , Auth::id())->first()->delete();
        return back();
    }
}
