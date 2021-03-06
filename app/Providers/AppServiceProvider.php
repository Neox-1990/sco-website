<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('registration.create', function ($view) {
            $view->with('sco_settings', \App\Setting::getSetup());
        });
        view()->composer('index', function ($view) {
            $view->with('sco_settings', \App\Setting::getSetup());
        });
        view()->composer('master.header', function ($view) {
            $view->with('sco_settings', \App\Setting::getSetup());
        });
        view()->composer('myteams.index', function ($view) {
            $view->with('sco_settings', \App\Setting::getSetup());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
