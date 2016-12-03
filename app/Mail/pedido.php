<?php

namespace App\Mail;
use App\Carrito;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class pedido extends Mailable
{
    use Queueable, SerializesModels;
    public $carrito;
    public $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Carrito $carrito, $id)
    {
        $this->carrito  = $carrito;
        $this->id       = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.pedido');
    }
}
