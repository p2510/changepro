<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Recharge;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::define('can-post-transfer',function (User $user)
        {
            $get_recharge_solde=Recharge::where("user_id",$user->id)->firstOrFail();
            $response = ($get_recharge_solde["amount"]>=10) ? true : false ;
            return $response;
        });
    }
}
