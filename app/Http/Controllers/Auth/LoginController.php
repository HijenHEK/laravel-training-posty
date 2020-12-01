<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest') ;
    }
    public function index() {
        return view('auth.login');
    }
    public function store(Request $r) {

        $r->validate([
            'password' => 'required',
            'email' => 'required|email'
        ]);
            
        
        
        if(! Auth::attempt(['email' => $r->email, 'password' => $r->password] , $r->remember )){
            return back()->with('login-failed' , 'Invalid login details !! try again ');
        };
        return redirect()->route('posts');
    }
}
