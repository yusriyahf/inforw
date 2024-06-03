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
            return $user->roles->nama === 'admin';
        });

        // Gate untuk Warga
        Gate::define('is-warga', function (User $user) {
            return $user->roles->nama === 'warga';
        });

        // Gate untuk RT
        Gate::define('is-rt', function (User $user) {
            return $user->roles->nama === 'rt';
        });

        // Gate untuk RW
        Gate::define('is-rw', function (User $user) {
            return $user->roles->nama === 'rw';
        });
        Gate::define('is-sekretaris', function (User $user) {
            return $user->roles->nama === 'sekretaris';
        });
        Gate::define('is-bendahara', function (User $user) {
            return $user->roles->nama === 'bendahara';
        });
    }
}
