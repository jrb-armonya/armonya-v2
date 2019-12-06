<?php

namespace App\Services\EspacePartenaire;

use App\Facture;
use App\Partenaire;
use EspacePartenaireService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Services\EspacePartenaire\Http\Composer\CurrentPartenaireComposer;

class EspacePartenaireServiceProvider extends ServiceProvider
{

    public function boot()
    {
        
        // laod Routes
        $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
        // load Views
        $this->loadViewsFrom(__DIR__ . '/views', 'espace-partenaire');

        View::composer('espace-partenaire*', CurrentPartenaireComposer::class);
        
    }
}
