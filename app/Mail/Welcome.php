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

  public $user,
         $template,
         $button;

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
    $this->template = TemplateMail::where('type', 0)->first();
    $this->button['url'] = 'http://www.google.fr';
    $this->button['type'] = 'success';
    $this->button['textButton'] = 'Connectez-vous !';

    return $this->view('layouts.mail.layout', [$this->template->html_content, $this->button])
      ->subject($this->template->title . ' ' . $this->user->firstname);


  }
}
