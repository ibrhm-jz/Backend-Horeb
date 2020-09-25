<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mensaje;
    public $fromEmail;
    public $fromname;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mensaje,$fromEmail,$fromname)
    {
        $this->mensaje = $mensaje;
        $this->fromEmail = $fromEmail;
        $this->fromname = $fromname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view("bienvenida")
            ->from("contacto.sumhoreb@gmail.com")
            ->subject("Alguien consulto la web");
    }
}
