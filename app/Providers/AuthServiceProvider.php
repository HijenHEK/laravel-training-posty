<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('delete-post' , function (User $user ,Post $post){
            
            return $post->user->is($user);
        });
        Gate::define('delete-comment' , function (User $user ,Comment $comment){
            
            return $comment->user->is($user) || $comment->post->user->is($user);
        });

        Gate::define('follow' , function(User $user , User $u ) {
            return !( $user->isFollowing($u) || $user->is($u) ); 
        });
        //
    }
}
