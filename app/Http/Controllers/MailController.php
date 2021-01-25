<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MailController extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $view_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$view_name)
    {
        $this->user = $user;
        $this->view_name = $view_name;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->view_name);
    }

}
