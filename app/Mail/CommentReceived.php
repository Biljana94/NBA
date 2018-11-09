<?php

namespace App\Mail;

use App\Team;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $team; //mora biti public da bi blade mogao da ga vidi; saljemo mail timu

    public function __construct(Team $team) //MORAMO U KONSTRUKTORU OVDE PISATI TYPEHINTING I VARIJABLU DA BI NAM PREPOZNAO $team
    {
        $this->team = $team; //dodeljujemo vrednost timu
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.comment-received'); //saljemo mail koji cemo napisati u comment-received.blade.php
    }
}
