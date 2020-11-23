<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\{ProfilePolicy, DeliveryAddressPolicy, OrderPolicy};
use App\Models\{Profile, DeliveryAddress, Order};

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Profile::class => ProfilePolicy::class,
        DeliveryAddress::class => DeliveryAddressPolicy::class,
        Order::class => OrderPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define(
            'viewAny',
            function ($user) {
                return $user->isSuperAdmin();
            }
        );

        Gate::define(
            'admin',
            function ($user) {
                return $user->isSuperAdmin() || $user->isAdmin();
            }
        );
    }
}
