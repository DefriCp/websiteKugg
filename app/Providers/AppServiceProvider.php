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
        // Share pengaturan situs ke semua view sebagai $globalSetting
        View::composer('*', function ($view) {
            $globalSetting = SiteSetting::first();
            $view->with('globalSetting', $globalSetting);
        });
    }
}
