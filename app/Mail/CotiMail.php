<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CotiMail extends Mailable
{
    use Queueable, SerializesModels;
  

    public $subject ="Cotizacion Speed";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        //traer la vista del correo 
        return $this->view('emails.cotizacion');
    }
}
