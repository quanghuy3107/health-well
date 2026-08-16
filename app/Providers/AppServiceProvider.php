<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
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
        // Share site settings with all views
        View::composer('*', function ($view) {
            try {
                $view->with('siteSetting', function (string $key, $default = null) {
                    return SiteSetting::getValue($key, $default);
                });
            } catch (\Exception $e) {
                // Fail silently if MongoDB is not available
            }
        });
    }
}
