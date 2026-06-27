<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::define('view-admin', function ( $user) {
            if ($user->id === 1) {
                return Response::allow();
            }
            return Response::deny('You do not have permission to view the admin page.');
        });


        $compiledViewsPath = config('view.compiled', storage_path('framework/views'));

        if (! is_dir($compiledViewsPath) || ! is_writable($compiledViewsPath)) {
            $fallbackPath = rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR)
                .DIRECTORY_SEPARATOR.'laravel'
                .DIRECTORY_SEPARATOR.md5(base_path())
                .DIRECTORY_SEPARATOR.'views';

            if (! is_dir($fallbackPath)) {
                @mkdir($fallbackPath, 0777, true);
            }

            if (is_dir($fallbackPath) && is_writable($fallbackPath)) {
                config(['view.compiled' => $fallbackPath]);
            }
        }
    }
}
