<?php

namespace App\Http\Controllers;

use PDF;
use MAIL;

class PruebaController extends Controller
{
    public function sendMailWithPDF()
    {
        $data["email"] = "b.desarrolloweb12@gmail.com";
        $data["title"] = "bienvenidos a speed";
        $data["body"] = "Correo de prueba";

        $pdf = PDF::loadView('emails.prueba', $data);

        Mail::send('emails.prueba', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "prueba.pdf");
        });
 
        dd('Email has been sent successfully');
    }
}