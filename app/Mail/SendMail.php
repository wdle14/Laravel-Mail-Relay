<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    private $header;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($header)
    {
        $this->header = $header;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'),$this->header['APP_NAME'])
                     ->subject($this->header['SUBJECT'])
                     ->to($this->header['MAIL_TO'],'test')
                     ->with([
                         'body' => $this->header['BODY']
                     ])
                     ->view('emails.notif');
    }
}
