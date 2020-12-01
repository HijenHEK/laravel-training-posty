<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return back();

    }

    public function destroy(Post $post){
        $post->likes->where("user_id" , Auth::id())->first()->delete();
        return back();
    }
}
