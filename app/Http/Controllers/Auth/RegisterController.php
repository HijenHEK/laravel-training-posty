<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest') ;
    }

    public function index() {
        return view('auth.register');
    }
    public function store(Request $r) {

        $r->validate([
            'name' => 'required|min:3|max:255',
            'password' => 'required|min:5|confirmed|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|min:3|alpha_dash|max:255|unique:users'
        ]);

        $u = new User() ;
        $u->name = $r->name ;
        $u->email = $r->email ;
        $u->username = $r->username ;
        $u->password = Hash::make($r->password) ;

        $u->save();
        
        if(! Auth::attempt(['email' => $r->email, 'password' => $r->password])){
            return back()->with('login-failed' , 'login failed for some reason , please try again later');
        };
        return redirect()->route('Dashboard');
    }
}
