<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReponseSurAnnonce extends Notification
{
    use Queueable;

    public $id;
    public $title;
    public $typeObjet;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id,$title,$typeObjet)
    {
        //
        $this->id=$id;
        $this->title=$title;
        $this->typeObjet=$typeObjet;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
   /* public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }*/

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    /*public function toDatabase($notifiable)
    {
        return [
            
        ];
    }*/
    public function toArray($notifiable)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'typeObjet'=>$this->typeObjet
        ];
    }
}
