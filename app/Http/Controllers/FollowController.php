<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth ;
use App\Models\User ;
class FollowController extends Controller
{
    //

    public function store(User $user) {

        // $this->authorize('follow' , $user);

        return Auth::user()->follow($user);
        // return back();
    }

    public function destroy(User $user) {
        // $this->authorize('unfollow' , $user);

        return Auth::user()->unfollow($user);
        // return back();


    }
}
