<?php
/**
 * routes for Predictif
 */

Route::group(['namespace' => 'App\Services\Predictif\Http\Controllers', 'prefix' => 'application', 'middleware' => ['web', 'auth']], function() {
    // predictif-generator Controller Service
    Route::resource('generator/files', 'Files\FilesController');
    
    /**
     * ======== Societes ========
     */
    // societe.create
    Route::post('societe/post', 'Societes\CreateSociete@create')->name('societe.create');
    // societe.destroy
    Route::get('societe/destroy/{id}', 'Societes\DeleteSociete@delete')->name('societe.destroy');
    // add-societe-to-file
    Route::get('generator/add-societe-to-file/{id}', 'Societes\AddRemoveSocieteFromFile@add')->name('add-societe-to-file');
    // remove-societe-from-file
    Route::get('generator/remove-societe-to-file/{id}', 'Societes\AddRemoveSocieteFromFile@remove')->name('remove-societe-from-file');

    // Command create
    Route::get('generator/command/create', 'Commandes\CommandesController@create')->name('commande.create');
    // Generate Command
    Route::post('generator/command/generate', 'Commandes\GenerateCommand@generate')->name('generate.command');
    
    /**
     * ======== INDEX (magasin)  ========
     */
    Route::get('/generator', 'PredictifController@index');

    /** ======= Files ========= */
    Route::post('/files/datatable', "DataTables\FileDataTable@getData")->name('get.data.file');
});