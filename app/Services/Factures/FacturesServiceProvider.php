<?php

namespace App\Services\Factures;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use App\Services\Factures\Http\Controllers\FacturesController;

class FacturesServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('factures', function ($app) {
            return new FacturesController;
        });
    }

    public function boot()
    {
        // laod Routes
        $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');

        // load Views
        $this->loadViewsFrom(__DIR__ . '/views', 'factures');
    }
}
