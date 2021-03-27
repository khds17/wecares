<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnvioProposta;
use App\Models\prestadores;
use App\Models\solicitantes;
use App\Models\pacientes;

class EmailsController extends Controller
{
    private $idProposta;
    private $idPrestador;
    private $idSolicitante;
    private $idPaciente;

    public function __construct($proposta)
    {
        $this->idProposta = $proposta->id;
        $this->idPrestador = $proposta->ID_PRESTADOR;
        $this->idSolicitante = $proposta->ID_SOLICITANTE;
        $this->idPaciente = $proposta->ID_PACIENTE;
        $this->objPrestador = new prestadores();
        $this->objSolicitante = new solicitantes();
        $this->objPaciente = new pacientes();
    }

    public function envioProposta()
    {
        $prestador = $this->objPrestador->find($this->idPrestador);

        Mail::to($prestador->EMAIL)
            ->send(new EnvioProposta($prestador));
    }
}
