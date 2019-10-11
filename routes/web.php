<?php

use App\Services\Predictif\Models\Phone;

Route::get('/', function () {
    return view('site.html.index');
});

Auth::routes();
// In production mode (origin/master) add ipCheck middleware
Route::group(['middleware' => ['auth']], function () {
    // dashboard
    Route::get('/dashboard', 'DashboardController@index');
    // POST DATATABLE
    Route::post('get-data-my-datatables', ['as' => 'get.data', 'uses' => 'DataTables\DataTablesController@getData']);
    //Configuration
    Route::group(['prefix' => 'configuration', 'namespace' => 'Config'], function () {
        //users
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UsersController@index');
            Route::post('get', 'UsersController@getUser');
            Route::post('update', 'UsersController@update');
            Route::post('delete', 'UsersController@delete');
            Route::post('create', 'UsersController@createUser')->name('create.user');
        });

        //roles
        Route::group(['prefix' => "roles"], function () {
            Route::get('/', 'RolesController@index');
            Route::post('store', 'RolesController@store');
            Route::get('edit/{id}', 'RolesController@edit');
            Route::post('update', 'RolesController@update');
        });

        //permissions
        Route::group(['prefix' => 'permissions'], function () {
            Route::post('store', 'PermissionsController@store')->name('permission.store');
            Route::post('delete', 'PermissionsController@delete')->name('permission.delete');
        });

        //Partenaires
        Route::resource('/partenaires', 'PartenaireController');
        Route::post('/partenaires/getEmails', 'PartenaireController@getEmails');
        Route::post('/partenaires/add-email', 'PartenaireController@addEmail')->name('partenaires.add-email');

        Route::post('/partenaires/getPartenaire', 'PartenaireController@getPartenaire');
        Route::post('/partenaires/delete', 'PartenaireController@deletePartenaire');
        Route::post('/partenaires/create-espace-partenaire', 'CreateEspacePartenaire@create');

        //get roles
        Route::post('/roles', 'RolesController@roles');
    });
    // Fiches
    Route::group(['prefix' => 'fiches', 'namespace' => 'Fiches'], function () {

        Route::get('create', 'FichesController@create')->name('fiche.create');
        Route::post('store', 'FichesController@store');
        Route::get('status/{id}', 'DisplayFichesController@getFichesByStatus');
        Route::get('all', 'DisplayFichesController@all');
        Route::get('trash', 'DisplayFichesController@trash');
        //Route du fichier click on fiche (ajax pour mettre la fiche dans le modal)
        Route::post('getFiche', 'FichesController@getFiche');
        Route::post('close', 'FichesController@closeFiche');

        Route::get('done/{id}', 'DisplayFichesController@getDoneStatus');
        Route::get('/created', 'DisplayFichesController@createdMonth');

        // check if the fiche has a partenaire
        Route::post('hasPartenaire/bool', 'FichesController@hasPartenaireAjax');

        // fiches for plateau
        Route::get('/plateau', 'DisplayFichesController@plateau');
        Route::get('/plateau/valid', 'DisplayFichesController@plateauValid');
        Route::get('/plateau/no-valid', 'DisplayFichesController@plateauNoValid');

        // Fiches for post-conf
        Route::get('/post-conf/confirmed', 'DisplayFichesController@postConfConfirmed');

        // Delete Fiche Rappel
        Route::post('/delete/rappel', 'DeleteFicheRappel@delete');
    });
    //Rapports
    Route::group(['namespace' => 'Rapports'], function () {
        //MyRapports
        Route::get('/getMyCreatedToday', 'MyRapportsController@getMyCreatedToday');
        Route::get('/getMyValidCreatedToday', 'MyRapportsController@getMyValidCreatedToday');
        Route::get('/getMyNoValidCreatedToday', 'MyRapportsController@getMyNoValidCreatedToday');

        Route::get('/getMyCreatedThisMonth', 'MyRapportsController@getMyCreatedThisMonth');
        Route::get('/getMyValidCreatedThisMonth', 'MyRapportsController@getMyValidCreatedThisMonth');
        Route::get('/getMyNoValidCreatedThisMonth', 'MyRapportsController@getMyNoValidCreatedThisMonth');

        Route::get('/my-team', 'MyRapportsController@myTeam');
        Route::get('/mes-fiches', 'MyRapportsController@mesFiches');
        Route::get('/mes-rappels', 'MyRapportsController@mesRappels');
        // Agent non conforme
        Route::get('/non-conforme', 'MyRapportsController@nonConforme');

        Route::get('/week-production', 'RapportsController@weekProduction');

        Route::group(['prefix' => 'rapports'], function () {
            Route::resource('/', 'RapportsController');
            //Get the rapports of the given role
            Route::get('role/{role}', 'RapportsController@getRapportsByRole');
            //single agent rapports
            Route::get('role/agent/{id}/{month}', 'RapportsController@getRapportEcouteUser');
            Route::post('agent/dateRange', 'RapportsController@monthSelect');
            // Synthèse
            Route::get('synthese', 'Synthese\SyntheseController@get');

            Route::get('user/details/report/{id}/{type}/{month}', 'Users\RapportUsersController@getDetailsOf');

            Route::get('user/{user}/{role}/{month}/{year}', 'Users\RapportUsersController@getUserRapport');
        });
    });

    // Doublons
    Route::group(['prefix' => 'doublons', 'namespace' => 'Doublons'], function () {
        //index
        Route::get('/', 'DoublonsController@index');
        // ajax route to dispatch the SearchDoublonsJob
        Route::get('/execute', 'DoublonsController@dispatchJob')->name('doublons.exec');

        // pas doublons
        Route::get('/pas-doublons/{ficheOne_id}/{ficheTwe_id}', 'DoublonsController@pasDoublons');
        Route::get('/is-doublons/{fiche}/{doublon}', 'DoublonsController@isDoublons');
    });

    // *** Route for espace-partenaire prefix=> 'espace-partenaire' ***

    // View PDF
    Route::get('/pdf/{id}', '\App\Export\Export@viewPdf');
    // Status Resource
    Route::resource('status', 'Status\StatusController');
    // Historique
    Route::get('/historique/fiche/{id}', 'Historique\HistoriqueController@fiche');
    // Historique details
    Route::get('/historique/details/{id}', 'Fiches\HistoricFiche@getDetails');
    // Historique details first
    Route::get('/historique/details/first/{fiche_id}', 'Fiches\HistoricFiche@getFirstDetails');
    // get the last actions (ajax call) 
    Route::get('/actions/last', 'Actions\ActionsController@last');
    // Archive 'non-valide'
    Route::get('/archive/non-valides', 'Fiches\DisplayFichesController@noValid');
    //Search
    Route::post('/search', 'Search\SearchController@get');
    // clear-caches
    Route::get('/clear-cache', function () {
        Artisan::call('cache:clear');
        return "Cache is cleared";
    });
});

/**
 * Testing Routes
 */
Route::get('/reset-generator', function () {
    ini_set('memory_limit', '-1');
    ini_set('max_execution_time', 0);
    echo "Reset started ... #### ";

    $phones = Phone::where('file_id', '!=', null)->orWhere('used', 1)->get();
    foreach ($phones as $phone) {
        $phone->used = 0;
        $phone->file_id = null;
        $phone->save();
    }

    echo " #### Phones reset successfully ...";

    $societe = \App\Services\Predictif\Models\Societe::where('inFile', 1)->get();
    foreach ($societe as $soc) {
        $soc->inFile = 0;
        $soc->save();
    }
    echo " #### Societes reset successfully ...";
    return '##### DONE #####';
});

Route::get('/deleted-today', function () {
    // $fiches = App\Fiche::whereDate('deleted_at', Carbon\Carbon::today())->withTrashed()->get();
    // return $fiches;

    $doublons = App\Doublon::where('fiche1', 7327)->orWhere('fiche2', 7327)->get();
    foreach ($doublons as $d) {
        $d->delete();
    }
    return 'NICE';
});


Route::get('/best-ta', function () {
    echo '### Processing... ### <br>';
    $agents = App\User::where('role_id', 2)->get();
    foreach ($agents as $agent) {
        echo $agent->name . ' => ' . $agent->fiches()->count() . '<br>';
    }
    echo '### DONE ###';
});


Route::get('/github-hook', function(){
    echo "WEBHOOK";
    echo "TEST 2";
});