<?php

namespace App\Jobs;

use App\Mail\SendNewsletter;
use App\Newsletter;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendNewsletterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $newsletter;

    /**
     * Create a new job instance.
     *
     * @param Newsletter $newsletter
     */
    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $counter = 0;
        $this->newsletter->status = 'sending';
        $this->newsletter->update();

        if ($this->newsletter->sendTo == 1) {
            $users = User::all();
        } else {
            $users = User::where('newsletter', '1')->get();
        }

        foreach ($users as $user) {
            Mail::to($user)->send(new SendNewsletter($this->newsletter));
            $counter += 1;

            $this->newsletter->counter = $counter; // update live counter in index page
            $this->newsletter->save();
        }

        $this->newsletter->status = 'sent';
        $this->newsletter->counter = $counter;
        $this->newsletter->save();
    }
}
