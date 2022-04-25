<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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
        Gate::before(function(User $user){
            if($user->isAdmin()){
                return true;
            }
        });
        //Gate::define('update-post', function(User $user, Comment $postcomment){
            //return true; //deze gate is enkel beschikbaar voor geautorizeerde users
            //WIE heeft dit geschreven
            //return $postcomment->user->is($user);
       // });


        //
    }
}
