<?php

namespace App\Http\Controllers;

use App\Events\Update;
use Illuminate\Support\Facades\Auth ;
use App\Models\User ;
class FollowController extends Controller
{
    //

    public function store(User $user) {

        // $this->authorize('follow' , $user);
        if(! Auth::user()->isFollowing($user)) {
            event( new Update());

            return Auth::user()->follow($user);
            // return back();
        }else{
            return response('Already following' , '413');
        }
        

    }

    public function destroy(User $user) {
        // $this->authorize('unfollow' , $user);
        if(Auth::user()->isFollowing($user)) {

        event( new Update());

        return Auth::user()->unfollow($user);
        // return back();
        }else{
            return response('Already unfollowing' , '413');
        }

    }
}
