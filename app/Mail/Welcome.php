<?php

namespace App\Mail;

use App\TemplateMail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Welcome extends Mailable implements ShouldQueue
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

    return $this->markdown('emails.welcome')
      ->subject('Inscription sur '.config('app.name'));

  }
}


