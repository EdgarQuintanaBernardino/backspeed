<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirCitaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    //public $subject ="Confirmacion de Cita Speed";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        //traer la vista del correo 
     
        return 
        $this
        ->from("desarrollospeed12@gmail.com")
        ->view('emails.confircita')
        ->subject("Speed Pro")
        ->with($this->data);
    }
}
