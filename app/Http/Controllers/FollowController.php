<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth ;
use App\Models\User ;
class FollowController extends Controller
{
    //

    public function store(User $user) {
        Auth::user()->follow($user);
        return back();
    }

    public function destroy(User $user) {
        Auth::user()->unfollow($user);
        return back();


    }
}
