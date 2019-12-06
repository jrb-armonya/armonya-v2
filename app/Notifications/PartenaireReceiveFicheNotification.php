<?php

namespace App\Notifications;

use App\Fiche;
use App\Partenaire;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PartenaireReceiveFicheNotification extends Notification
{
    use Queueable;


    public $fiche;
    public $partenaire;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Fiche $fiche, Partenaire $partenaire)
    {
        $this->fiche = $fiche;
        $this->partenaire = $partenaire;
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
        $id = $this->partenaire->id;
        return ["partenaire-$id"];
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
            'fiche' => $this->fiche
        ];
    }
}
