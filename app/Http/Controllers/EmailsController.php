<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnvioProposta;
use App\Mail\AceitePropostaPrestador;
use App\Mail\AceitePropostaSolicitante;
use App\Mail\RecusaPropostaSolicitante;
use App\Mail\AceiteCadastroPrestador;
use App\Mail\RecusaCadastroPrestador;
use App\Models\prestadores;
use App\Models\solicitantes;
use App\Models\pacientes;

class EmailsController extends Controller
{
    //Atributos da tabela proposta
    private $idProposta;
    private $idPrestadorProposta;
    private $idSolicitanteProposta;

    //Atributos da tabela prestador
    private $idPrestador;


    public function __construct($dados)
    {
        //Objetos
        $this->objPrestador = new prestadores();
        $this->objSolicitante = new solicitantes();
        $this->objPaciente = new pacientes();

        //Atributos da tabela proposta
        $this->idProposta = $dados->id;
        $this->idPrestadorProposta = $dados->ID_PRESTADOR;
        $this->idSolicitanteProposta = $dados->ID_SOLICITANTE;

        //Atributos da tabela prestador
        $this->idPrestador = $dados->ID;
    }

    public function envioProposta()
    {
        $prestador = $this->objPrestador->find($this->idPrestadorProposta);

        Mail::to($prestador->EMAIL)
            ->send(new EnvioProposta($prestador));
    }

    public function aceitePropostaPrestador()
    {
        $solicitante = $this->objSolicitante->find($this->idSolicitanteProposta);

        Mail::to($solicitante->EMAIL)
            ->send(new AceitePropostaPrestador($solicitante));
    }

    public function aceitePropostaSolicitante()
    {
        $prestador = $this->objPrestador->find($this->idPrestadorProposta);

        Mail::to($prestador->EMAIL)
            ->send(new AceitePropostaSolicitante($prestador));
    }

    public function recusaPropostaSolicitante()
    {
        $prestador = $this->objPrestador->find($this->idPrestadorProposta);

        Mail::to($prestador->EMAIL)
            ->send(new RecusaPropostaSolicitante($prestador));
    }

    public function aceiteCadastroPrestador()
    {
        $prestador = $this->objPrestador->find($this->idPrestador);

        Mail::to($prestador->EMAIL)
            ->send(new AceiteCadastroPrestador($prestador));
    }

}
