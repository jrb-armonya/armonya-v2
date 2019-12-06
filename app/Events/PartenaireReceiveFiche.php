<?php

namespace App\Events;

use App\Fiche;
use App\Partenaire;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PartenaireReceiveFiche implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    
    public $fiche;

    public $partenaire;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Fiche $fiche, Partenaire $partenaire)
    {
        $this->fiche = $fiche;
        $this->partenaire = $partenaire;
    }

    public function broadcastOn()
    {
        $id = $this->partenaire->id;

        return ["my-channel-$id"];
    }

}
