<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Gate untuk Admin
        Gate::define('is-admin', function (User $user) {
            return $user->roles->nama === 'Admin';
        });

        // Gate untuk Warga
        Gate::define('is-warga', function (User $user) {
            return $user->roles->nama === 'Warga';
        });

        // Gate untuk RT
        Gate::define('is-rt', function (User $user) {
            return $user->roles->nama === 'RT';
        });

        // Gate untuk RW
        Gate::define('is-rw', function (User $user) {
            return $user->roles->nama === 'RW';
        });
    }
}
