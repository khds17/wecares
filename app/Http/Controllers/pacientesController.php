<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estados;
use App\Models\cidades;
use App\Models\enderecos;
use App\Models\pacientes;
use App\Models\solicitantes;
use App\Models\familiaridade;
use Illuminate\Support\Facades\DB;

class pacientesController extends Controller
{

    //Instanciando as classes
    public function __construct()
    {
        $this->objSolicitante = new solicitantes();
        $this->objPaciente = new pacientes();
        $this->objEstados = new estados();
        $this->objCidades = new cidades();
        $this->objEndereco = new enderecos();
        $this->objFamiliaridade = new familiaridade(); 
        
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
        return view('pacientes/edit');
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
