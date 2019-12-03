<?php

namespace App\Services\EspacePartenaire\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EPNotificationController extends Controller
{

    

    /**
     * Get the last 5 notifiations for the current Partenaire.
     *
     * @return mixed
     */
    public function getMyNotifications()
    {
        $partenaire = Auth::user()->partenaire()->first();

        $unread = $partenaire->unreadNotifications->sortByDesc('updated_at');

        $read = $partenaire->notifications()->where('read_at', '!=', null)->limit(5)->get()->sortByDesc('created_at');

        return [$unread, $read];
        
    }
    
    /**
     * Mark all Partenaire Notifications as Read
     *
     * @return json
     */
    public function markAllNotificationsAsRead()
    {
        $partenaire = Auth::user()->partenaire()->first();
        
        foreach($partenaire->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return response()->json(200);
    }

    public function allNotifications()
    {
        return view('espace-partenaire::notification.all')
            ->with('notifications', Auth::user()->partenaire()->first()->notifications);
    }
}