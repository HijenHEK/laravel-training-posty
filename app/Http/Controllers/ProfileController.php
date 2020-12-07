<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function show(User $user){
        $posts = $user->posts()->with(['user' , 'likes' , 'comments'])->latest()->paginate(10);
        return view('profile.index' , [
            'user' => $user,
            'posts' => $posts
        ]);
    }
    public function data(User $user){
        return [
            "id" => $user->id , 
            "name" => $user->name , 
            "username" => $user->username , 
            "followers" => $user->followers->count() , 
            "following" => $user->followers->contains(Auth::user()),
            "posts" => $user->posts->count() , 
            "likes" => $user->recievedLikes->count() , 
        ];

        
    }
    public function posts(User $user){
        return $user->posts()->with(['user' , 'likes' , 'comments'])->latest()->paginate(10);

    }
}
