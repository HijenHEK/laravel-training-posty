<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function feed()
    {
        return auth()->user()->feed() ;
        
        
    }

    public function index()
    {
        $posts = auth()->user()->feed() ;
        
        return view('posts.index' , [
            'posts' => $posts
        ]);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "body" => "required|min:3"
        ]);
        
        $request->user()->posts()->create([
            "body" => $request->body,
        ]);

        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // return ["post" => $post , "comments" => Comment::where('post_id',$post->id)->latest()->with('user')->get() ] ;
        return view('posts.show' , [
            'post' => $post,
            'comments' => Comment::where('post_id',$post->id)->latest()->with('user')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       
        $this->authorize('delete-post', $post);
        $post->delete();
        
        if( Str::contains(url()->previous(), "posts/") ){
            return redirect('posts');
        }
        return back();
    }
}
