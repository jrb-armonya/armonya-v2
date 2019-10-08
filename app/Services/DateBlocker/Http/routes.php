<?php
/**
 * routes for DateBlocker
 */

Route::group(['namespace' => 'App\Services\DateBlocker\Http\Controllers', 'prefix' => 'configuration', 'middleware' => ['web', 'auth']], function() {

    Route::resource('dates', 'DatesController');
});