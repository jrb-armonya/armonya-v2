<?php
// routes for Espace Partenaire
Route::group(
    [
        'middleware' => ['web', 'auth'],
        'namespace' => 'App\Services\EspacePartenaire\Http\Controllers',
        'prefix' => 'espace-partenaire'
    ],
    function () {
        Route::get('/', 'EspacePartenaireController@index');
        Route::get('/profil', 'EspacePartenaireController@profile');
        Route::post('/profile/update', 'EspacePartenaireController@updateProfile')->name('part.update.profile');
        Route::get('rendez-vous', 'EspacePartenaireController@mesRendezVous');
        Route::get('factures', 'EspacePartenaireController@factures');
        Route::get('factures/show/{id}', 'EspacePartenaireController@facturesShow');

        // Partenaire send compte rendu
        Route::post('send-cr', 'SendCompteRendu@handle');

        // get the CR value of a Fiche
        Route::post('getCRValue', 'GetCR@last');

        // Get notifications of the current Partenaire (connected)
        Route::get('myNotifications', 'EPNotificationController@getMyNotifications');

        Route::post('notifications/markAllNotificationsAsRead', 'EPNotificationController@markAllNotificationsAsRead');

        // Partenaire get all Notifications
        Route::get('notifications/all', 'EPNotificationController@allNotifications');
    }
);
