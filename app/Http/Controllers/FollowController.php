<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth ;
use App\Models\User ;
class FollowController extends Controller
{
    //

    public function store(User $user) {
        $this->authorize('follow' , $user);
        Auth::user()->follow($user);
        return back();
    }

    public function destroy(User $user) {
        $this->authorize('unfollow' , $user);

        Auth::user()->unfollow($user);
        return back();


    }
}
