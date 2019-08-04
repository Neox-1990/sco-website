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
        $info = [
        'html' => '',
        'text' => ''
      ];
        switch ($this->team->status) {
        case 0:
          $info['html'] = '<p>The Admins will now review the team to see if all requirements are met. Please <b>DO NOT</b> send us any money yet!</p>';
          $info['text'] = 'The Admins will now review the team to see if all requirements are met. Please # DO NOT # send us any money yet!';
          break;
        case 1:
          $info['html'] = '<p>Your team fulfils all requirements. Please <b>DO NOT</b> send us any money yet!</p>';
          $info['text'] = 'Your team fulfils all requirements. Please # DO NOT # send us any money yet!';
          break;
        case 2:
          $info['html'] = '<p>As soon as a confirmed team withdraws or gets withdrawn from the season, the next team on the waiting list (for that class) gets confirmed. The order of the waiting list depends on the team\'s pre-qualifying result and following that sign-up date of the team. If your team gets promoted from the waiting list, you do not have to pay the entry fee.</p>';
          $info['text'] = 'As soon as a confirmed team withdraws or gets withdrawn from the season, the next team on the waiting list (for that class) gets confirmed. The order of the waiting list depends on the team\'s pre-qualifying result and following that sign-up date of the team. If your team gets promoted from the waiting list, you do not have to pay the entry fee.';
          break;
        case 3:
          $info['html'] = '<p>Your team is qualified for the season. To get confirmed you now have to pay the season entry fee of $30. You can use the following paypal.me link to pay the fee:<br><br><a href="https://paypal.me/sportscaropen/30usd">https://paypal.me/sportscaropen/30usd</a><br><br><b>Make sure to send a note with your payment, so we know what team/car/entry that payment is meant for!</b></p>';
          $info['text'] = 'Your team is qualified for the season. To get confirmed you now have to pay the season entry fee of $30. You can use the following paypal.me link to pay the fee:

https://paypal.me/sportscaropen/30usd

# Make sure to send a note with your payment, so we know what team/car/entry that payment is meant for! #';
          break;
        case 4:
          $info['html'] = '<p>Your team is now officially confirmed for the season. Good luck and have fun.</p>';
          $info['text'] = 'Your team is now officially confirmed for the season. Good luck and have fun.';
          break;
      }
        $input = [
        'user' => $this->user,
        'team' => $this->team,
        'info' => $info
      ];
        return $this->view('mail.html.statuschanged')
        ->subject('SCO Team Status changed')
        ->text('mail.text.statuschanged')
        ->with('input', $input);
    }
}
