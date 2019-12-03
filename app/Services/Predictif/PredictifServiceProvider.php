<?php
namespace App\Services\Predictif;

use Illuminate\Support\ServiceProvider;

class PredictifServiceProvider extends ServiceProvider{

    public function register() {
        $this->app->bind('predictif', function ($app) {
            return 'Predictif';
        });
    }

    public function boot() {
        // laod Routes
        $this->loadRoutesFrom(__DIR__ .'/Http/routes.php');

        // load Views
        $this->loadViewsFrom(__DIR__ . '/Views', 'predictif');

        // Migrations
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
   
}