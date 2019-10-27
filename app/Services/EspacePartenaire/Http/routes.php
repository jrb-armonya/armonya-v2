<?php
// routes for Espace Partenaire
Route::group(
    [
        'middleware' => ['web', 'auth'],
        'namespace' => 'App\Services\EspacePartenaire\Http\Controllers',
        'prefix' => 'espace-partenaire'
    ],
    function () {
        Route::get('/create/{id}', 'EspacePartenaireController@create')
            ->name('espace-partenaire.create');
        Route::get('/', 'EspacePartenaireController@index');
        Route::get('/profil', 'EspacePartenaireController@profile');
        Route::get('rendez-vous', 'EspacePartenaireController@mesRendezVous');
        Route::get('factures', 'EspacePartenaireController@factures');
        Route::get('factures/show/{id}', 'EspacePartenaireController@facturesShow');
    }
);
