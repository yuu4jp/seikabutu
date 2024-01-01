<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
<<<<<<< HEAD
        \URL::forceScheme('https'); 
=======
        \URL::forceScheme('https');
>>>>>>> master
        $this->app['request']->server->set('HTTPS','on');
    }
}
