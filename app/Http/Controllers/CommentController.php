<?php

namespace App\Http\Controllers;

use App\Events\Update;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    

    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function model($model) {
        return "App\\Models\\$model";
    }
    public function index($model,$el ) {
        
        $el = $this->model($model)::find($el);
        return $el->comments()->with('user','likes')->latest()->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$model, $el )
    {
        

        $el = $this->model($model)::find($el);

        $request->validate([
            'content' => 'required'
        ]);
        
        $el->comments()->create([
            'user_id' => $request->user()->id ,
            'content' => $request->content ,
            
        ]);
        event( new Update());

        // $comment = new Comment();
        // $comment->content = $request->content ;
        // $comment->user_id = $request->user()->id ;
        // $comment->commentable_id = $el->id;
        // $comment->commentable_type= model;
        // $comment->save() ;
        
        
        // return back();

    }

    
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {

        // $this->authorize('delete-comment' , $comment);
        
        $comment->delete();

        // return back();
        event( new Update());

    }
}
