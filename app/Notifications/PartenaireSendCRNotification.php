<?php

namespace App\Notifications;

use App\CR;
use App\User;
use App\Fiche;
use App\Partenaire;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PartenaireSendCRNotification extends Notification
{
    use Queueable;


    public $user;
    public $fiche;
    public $partenaire;
    public $state;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Fiche $fiche, Partenaire $partenaire, $cr, User $user, $state)
    {
        $this->fiche = $fiche;
        $this->partenaire = $partenaire;
        $this->cr = $cr;
        $this->user = $user;
        $this->state = $state;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function broadcastOn()
    {
        return ["cr-from-part-user-" . $this->user->id];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'fiche' => [
                'id' => $this->fiche->id,
                'name' => $this->fiche->name . ' ' . $this->fiche->prenom
            ],
            'partenaire' => [
                'id' => $this->partenaire->id,
                'name' =>  $this->partenaire->name
            ],
            'cr' => $this->cr,
            'state' => $this->state
        ];
    }
}
