<?php

namespace App\Providers;

use App\Fiche;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        # Set the timezone for Africa\Tunis
        # http://php.net/manual/fr/timezones.africa.php
        date_default_timezone_set('Africa/Tunis');

        # app('hostLocation') to know the host in all the application
        // $this->app->bind('hostLocation', function(){
        //     return $_SERVER['HTTP_HOST'];
        // });

        Schema::defaultStringLength(191);
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
