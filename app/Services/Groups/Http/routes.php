<?php

Route::group([
    'middleware' => ['web', 'auth'], 
    'namespace' => 'App\Services\Groups\Http\Controllers', 
    'prefix' => 'groups'
], function(){

    // Routes start here
    Route::get('/', 'GroupsController@index');

});