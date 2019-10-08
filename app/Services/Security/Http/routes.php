<?php
/**
 * routes for Securitu
 */

Route::group(['namespace' => 'App\Services\Security\Http\Controllers', 'prefix' => 'configuration', 'middleware' => ['web', 'auth']], function() {
    Route::resource('security', 'SecurityController');
});