<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use App\Policies\ProductPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        Product::class => ProductPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //Passport::routes();
        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
        });

        /* define a manager user role */
        Gate::define('isSeller', function($user) {
            return $user->role == 'seller';
        });

        /* define a user role */
        Gate::define('isUser', function($user) {
            return $user->role == 'customer';
        });
    }
}
