<?php

namespace App\Services\EspacePartenaire;

use App\Facture;
use App\Partenaire;
use EspacePartenaireService;
use Illuminate\Support\ServiceProvider;

class EspacePartenaireServiceProvider extends ServiceProvider
{
    public function register()
    {
        // code ...
    }

    public function boot()
    {
        // laod Routes
        $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
        // load Views
        $this->loadViewsFrom(__DIR__ . '/views', 'espace-partenaire');
    }
}
