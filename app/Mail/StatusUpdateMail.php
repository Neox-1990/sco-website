<?php

namespace App\Mail;

use App\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatusUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $team;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Team $team)
    {
        $this->team = $team;
        $this->user = $team->user()->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $input = [
        'user' => $this->user,
        'team' => $this->team
      ];
        return $this->view('mail.html.statuschanged')
        ->subject('SCO Team Status changed')
        ->text('mail.text.statuschanged')
        ->with('input', $input);
    }
}
