<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioProposta extends Mailable
{
    use Queueable, SerializesModels;

    public $prestador;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($prestador)
    {
        $this->prestador = $prestador;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Oba, você recebeu uma nova proposta')
            ->view('email.EnvioProposta')
            ->with('prestador', $this->prestador);
    }
}
