<?php

namespace App\Services\Groups;

use Illuminate\Support\ServiceProvider;

class GroupsServiceProvider extends ServiceProvider 
{

    public function register()
    {
        $this->app->bind('Groups', function(){
            return "Groups";
        });
    }

    public function boot()
    {
        // load Routes
        $this->loadRoutesFrom(__DIR__ .'/Http/routes.php');
        
        // load Views
        $this->loadViewsFrom(__DIR__ . '/views', 'groups');

    }


}