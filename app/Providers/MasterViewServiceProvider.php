<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MasterViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('master', function($view)
        {
            $view->with('username', \Auth::user()->username);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
