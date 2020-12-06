<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

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
}
