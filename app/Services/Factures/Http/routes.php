<?php

/**
 * Fiches Routes
 */

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'App\Services\Factures\Http\Controllers', 'prefix' => 'facturation'],  function () {

        // Controller
        Route::resource('factures', 'FacturesController');

        // new CreateFacture@create
        Route::post('/new', 'CreateFacture@createOrFind')->name('factures.new');

        // attache Fiche to Facture
        Route::get('add/fiche/{fiche_id}/{facture_id}', 'FacturesController@attacheFiche');

        // dettach Fiche from Facture
        Route::get('delete/fiche/{fiche_id}/{facture_id}', 'FacturesController@detachFiche');

        // Generate Facture: PDF + send with email
        Route::get('factures/preview/{id}', 'FacturesController@preview');

        // Downlaod the pdf
        Route::get('factures/generatePdf/{id}', 'FacturesController@generateAndDownlaodPDF');

        // Envoyer Facture à un Partenaire
        Route::post('sendFacture', 'SendFactureController@send');

});