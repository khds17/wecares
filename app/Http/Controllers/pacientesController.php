<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estados;
use App\Models\cidades;
use App\Models\enderecos;
use App\Models\pacientes;
use App\Models\solicitantes;
use App\Models\paciente_tipo;
use App\Models\paciente_localizacao;
use App\Models\familiaridade;
use Illuminate\Support\Facades\DB;

class pacientesController extends Controller
{

    //Instanciando as classes
    public function __construct()
    {
        $this->objSolicitante = new solicitantes();
        $this->objPaciente = new pacientes();
        $this->objPacienteTipo = new paciente_tipo();
        $this->objPacienteLocalizacao = new paciente_localizacao(); 
        $this->objEstados = new estados();
        $this->objCidades = new cidades();
        $this->objEndereco = new enderecos();
        $this->objFamiliaridades = new familiaridade();   
              
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Encontrando os pacientes do solicitante logado
        $pacientes = DB::table('PACIENTES')
                        ->join('SOLICITANTES', 'PACIENTES.ID_SOLICITANTE', '=', 'SOLICITANTES.ID')
                        ->join('users', 'SOLICITANTES.ID_USUARIO', '=', 'users.id')
                        ->where('SOLICITANTES.ID_USUARIO', auth()->user()->id)
                        ->select('PACIENTES.*')
                        ->get();

        //Encontrando o tipo dos pacientes do solicitante logado
        $pacientesTipos = DB::table('PACIENTES_TIPOS')
        ->join('PACIENTES', 'PACIENTES_TIPOS.ID', '=', 'PACIENTES.ID_TIPO')
        ->join('SOLICITANTES', 'PACIENTES.ID_SOLICITANTE', '=', 'SOLICITANTES.ID')
        ->join('users', 'SOLICITANTES.ID_USUARIO', '=', 'users.id')
        ->where('SOLICITANTES.ID_USUARIO', auth()->user()->id)
        ->select('PACIENTES_TIPOS.*')
        ->get();

        //Encontrando a localizaçao dos pacientes do solicitante logado
        $pacientesLocalizacao = DB::table('PACIENTE_LOCALIZACAO')
        ->join('PACIENTES', 'PACIENTE_LOCALIZACAO.ID', '=', 'PACIENTES.ID_LOCALIZACAO')
        ->join('SOLICITANTES', 'PACIENTES.ID_SOLICITANTE', '=', 'SOLICITANTES.ID')
        ->join('users', 'SOLICITANTES.ID_USUARIO', '=', 'users.id')
        ->where('SOLICITANTES.ID_USUARIO', auth()->user()->id)
        ->select('PACIENTE_LOCALIZACAO.*')
        ->get();

        return view('pacientes/index',compact("pacientes", "pacientesTipos", "pacientesLocalizacao"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Encontrando os pacientes do solicitante logado
        $paciente = $this->objPaciente->find($id);

        //Pegando todos os tipos de pacientes
        $pacientesTipos = $this->objPacienteTipo->all();

        //Pegando todas as localizações
        $pacientesLocalizacao = $this->objPacienteLocalizacao->all();

        //Encontrando o endereço da localização dos pacientes
        $endereco = $paciente->find($paciente->ID)
        ->relEndereco;

        $solicitante = $paciente->find($paciente->ID)
        ->relSolicitante;

        $cidades = $this->objCidades->all();

        $estados = $this->objEstados->all();

        //Encontrando a familiaridade do solicitante logado vinculado ao pacientes.
        // $solicitantesFamiliaridade = DB::table('FAMILIARIDADES')
        // ->join('SOLICITANTES', 'FAMILIARIDADES.ID', '=', 'SOLICITANTES.ID_FAMILIARIDADE')
        // ->join('users', 'SOLICITANTES.ID_USUARIO', '=', 'users.id')
        // ->where('SOLICITANTES.ID_USUARIO', auth()->user()->id)
        // ->select('FAMILIARIDADES.*')
        // ->get();

        $familiaridades = $this->objFamiliaridades->all();

        // dd($pacientesTipos);

        return view('pacientes/edit', compact("paciente", "pacientesTipos", "pacientesLocalizacao", "solicitante","familiaridades", "endereco", "cidades", "estados"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
