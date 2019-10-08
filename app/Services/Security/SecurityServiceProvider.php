<?php
namespace App\Services\Security;

use Security;
use Illuminate\Support\ServiceProvider;

class SecurityServiceProvider extends ServiceProvider{

    public function register() {
        $this->app->bind('security', function ($app) {
            return new Security;
        });
        
        // $this->app->bind('ip', function ($app) {
        //     return new MyIp;
        // });
    }

    public function boot() {
        // laod Routes
        $this->loadRoutesFrom(__DIR__ .'/Http/routes.php');
        
        // load Views
        $this->loadViewsFrom(__DIR__ . '/views', 'security');

        // Migrations
        // $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
   
}