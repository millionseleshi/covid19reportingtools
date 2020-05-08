<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OneTimePasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;

    /**
     * OneTimePasswordMail constructor.
     * @param $user
     * @param $password
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }
    /**
     * Create a new message instance.
     *
     * @return void
     */


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('vendor.notifications.first_time_login')
            ->from('emailfrom@gmail.com')->subject(
                'Your password to login to Covid-19 CallCenter'
            )->with(([
                'name' => $this->user->first_name . ' ' . $this->user->last_name,
                'password' => $this->password,
                'loginUrl' => route('login')
            ]));
    }
}
