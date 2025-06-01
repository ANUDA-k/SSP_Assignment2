<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    

    //  Custom redirect logic after login
    $this->app->singleton(LoginResponse::class, function () {
        return new class implements LoginResponse {
            public function toResponse($request)
            {
                $user = $request->user();
                if ($user && $user->is_admin) {
                    return redirect('/admin');
                }
                return redirect('/profile');
            }
        };
    });

    //  Custom redirect logic after registration
    $this->app->singleton(RegisterResponse::class, function () {
        return new class implements RegisterResponse {
            public function toResponse($request)
            {
                $user = $request->user();
                if ($user && $user->is_admin) {
                    return redirect('/admin');
                }
                return redirect('/profile');
            }
        };
    });
}
    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}

