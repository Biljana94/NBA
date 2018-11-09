<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User; //koristim User model jer useru saljem mail

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user; //atribut $user kojem cu da saljem mail
                //pisem public da bi blade mogao da pristupi useru
                //ako napisem protected moze da mu pristupi samo ta klasa i neka klasa koja tu nasledjuje

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user) //koristim typehinting User, i on prepoznaje da je model User.php
    {
        $this->user = $user; //dodeljujem vrednost useru jer njemu saljem mail
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.email-verification');
    }
}
