<?php
namespace App\Services\DateBlocker;

use Date;
use Illuminate\Support\ServiceProvider;

class DateBlockerServiceProvider extends ServiceProvider{

    public function register() {
        $this->app->bind('date', function ($app) {
            return new Date;
        });
    }

    public function boot() {
        // laod Routes
        $this->loadRoutesFrom(__DIR__ .'/Http/routes.php');
        
        // load Views
        $this->loadViewsFrom(__DIR__ . '/views', 'dateblocker');

        // Migrations
        // $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
   
}