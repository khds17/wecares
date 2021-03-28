<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AceitePropostaPrestador extends Mailable
{
    use Queueable, SerializesModels;

    public $solicitante;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($solicitante)
    {
        $this->solicitante = $solicitante;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Olá, temos novidades sobre sua proposta!')
            ->view('email.AceitePropostaPrestador')
            ->with('solicitante', $this->solicitante);
    }
}
