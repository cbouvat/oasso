<?php

namespace App\Mail;

use App\TemplateMail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $templateMail = TemplateMail::where('title', 'Et ratione corporis eius.')->first();

        $html = $templateMail->html_content;
        $text = $templateMail->text_content;


        return $this->view('vendor.notifications.email');

    }
}
