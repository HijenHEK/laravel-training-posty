<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;

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
    public function model($model) {
        if(!in_array($model , ['Post' , 'Comment'])) {
            return null;
        }
        return "App\\Models\\$model";
    }

    public function index($model ,$el) {
        
        $el = $this->model($model)::find($el);
        return [$el->likes()->get() , Auth::user() ? Auth::user()->like($el) : null] ;
    }
    public function store($model ,$el){
        
        $el = $this->model($model)::find($el);

        if(Request()->user()->like($el)){
            return response(null , 409);
        }

        $el->likes()->create([
            "user_id" => Auth::id()
        ]);

        // if(! $el->likes()->onlyTrashed()->where('user_id' , auth()->id())->count()) {
        //     Mail::to($el->user)->send(new PostLiked(Auth::user() , $el));

        // } ;

        // return back();

    }

    public function destroy($model ,$el){
        $el = $this->model($model)::find($el);

        if(!Request()->user()->like($el)){
            return response(null , 409);
        }
        $el->likes->where("user_id" , Auth::id())->first()->delete();
        // return back();
    }
}
