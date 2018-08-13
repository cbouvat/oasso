<?php

namespace App\Mail;

use App\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MembershipRelaunchMonth extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $subdcription;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Subscription $subscription)
    {
        $this->subdcription = $subscription;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->markdown('emails.membership.relaunch.month')
        ->subject('Votre adhésion chez '.config("app.name").'expire dans 1 mois');
    }
}
