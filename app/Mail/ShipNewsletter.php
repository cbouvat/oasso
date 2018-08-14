<?php

namespace App\Mail;

use App\Newsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShipNewsletter extends Mailable
{
    use Queueable, SerializesModels;
    public $newsletter;

    /**
     * Newsletters constructor.
     * @param Newsletter $newsletter
     */
    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newsletter.sending')
            ->text('emails.newsletter.sending_plain')
            ->subject($this->newsletter->title);
    }
}
