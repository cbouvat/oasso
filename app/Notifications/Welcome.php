<?php

namespace App\Notifications;

use View;
use App\TemplateMail;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Welcome extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //$mail = TemplateMail::find(1)->html_content;
    //$view = View::make('welcomeMail', ['data' => 'toto']);

//    return (new MailMessage)
//      ->greeting('Hello!')
//      ->line('One of your invoices has been paid!')
//      ->line('Thank you for using our application!');

//    return (new MailMessage)->view(
//      'welcomeMail', ['notif' => $notifiable]
//    );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
      //
    ];
    }
}
