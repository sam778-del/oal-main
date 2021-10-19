<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Messagetemplates extends Mailable
{
    use Queueable, SerializesModels;


    public $data;
    public $from_name;
    public $from_email;
    public $subject;
    public $message;
    public $attach;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,  $from_name, $from_email, $subject, $message, $attach)
    {
        $this->data = $data;   
        $this->from_name = $from_name; 
        $this->from_email = $from_email; 
        $this->subject = $subject; 
        $this->message = $message; 
        $this->attach = $attach; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(!empty($this->attach)){
            return $this
                ->from($this->from_email, $this->from_name)
                ->subject($this->subject)
                ->attach($this->attach)
                ->markdown('emails.messageTemplate');
        }else{
            return $this
                ->from($this->from_email, $this->from_name)
                ->subject($this->subject)
                ->markdown('emails.messageTemplate');
        }
    }
}
