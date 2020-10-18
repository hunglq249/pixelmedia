<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Common;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layouts._header'], function ($view) {
            $navMenu = Common::navMenu();
            $view->with('navMenu', $navMenu);
        });
        view()->composer(['layouts._footer'], function ($view) {
            $contactInfo = Common::contactInfo();
            $view->with('contactInfo', $contactInfo);
        });

    }
}
