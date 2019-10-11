<?php

Route::group([
    'middleware' => ['web', 'auth'], 
    'namespace' => 'App\Services\Groups\Http\Controllers', 
    'prefix' => 'groups'
], function(){

    // Routes start here
    Route::get('/', 'GroupsController@index');
    Route::post('create', 'GroupsController@store')->name('group.store');
    Route::get('edit/{id}', 'GroupsController@edit')->name('editGroup');
    Route::post('update', 'GroupsController@update')->name('updateGroup');
    Route::post('delete', 'GroupsController@delete')->name('deleteGroup');
});