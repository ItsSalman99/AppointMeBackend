<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpVerification extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;
    
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $data = $this->data;
        
        return $this->markdown('emails.verify', get_defined_vars());
    }
}
