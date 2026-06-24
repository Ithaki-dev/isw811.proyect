<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
