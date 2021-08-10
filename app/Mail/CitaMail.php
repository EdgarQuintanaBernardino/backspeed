<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CitaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
  

    public $subject ="Cita Speed";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
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
        $this
        ->from("desarrollospeed12@gmail.com")
        ->view('emails.cita')
        ->subject("Speed Pro")
        ->with($this->data);
    }
}