<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proposta;
use App\Models\solicitantes;
use App\Models\paciente_tipo;
use App\Models\pacientes;
use App\Models\prestadores;
use App\Models\cidades;
use App\Models\paciente_localizacao;
use Illuminate\Support\Facades\DB;

class servicosController extends Controller
{

        //Instanciando as classes
        public function __construct()
        {
            $this->objProposta = new proposta();  
            $this->objPrestador = new prestadores();
            $this->objSolicitante = new solicitantes();
            $this->objPaciente = new pacientes();
            $this->objPacienteTipo = new paciente_tipo();
            $this->objCidades = new cidades();
            $this->objPacienteLocalizacao = new paciente_localizacao(); 
                  
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function propostas(Request $request)
    {

    // Todos os select estão em um array dentro de um array, para isso, criei um foreach para remover todos do array

    $arraySolicitantes = $this->objSolicitante
                        ->where('ID_USUARIO', auth()->user()->id)
                        ->get();

    foreach ($arraySolicitantes as $arraySolicitante) {
        $solicitante = $arraySolicitante;
    }

    $arrayPacientes = $this->objPaciente
                    ->where('PACIENTES.ID', '=', $request->selectPaciente)
                    ->get();

    foreach ($arrayPacientes as $arrayPaciente) {
        $paciente = $arrayPaciente;
    }

    $arrayPacientesTipos = $this->objPacienteTipo
                        ->join('PACIENTES', 'PACIENTES_TIPOS.ID', '=', 'PACIENTES.ID_TIPO')
                        ->where('PACIENTES_TIPOS.ID', '=', $paciente->ID_TIPO)
                        ->select('PACIENTES_TIPOS.*')
                        ->get();

    foreach ($arrayPacientesTipos as $arrayPacienteTipos) {
        $pacienteTipo = $arrayPacienteTipos;
    }

    $arrayPacientesLocalizacao = $this->objPacienteLocalizacao
                                ->join('PACIENTES', 'PACIENTE_LOCALIZACAO.ID', '=', 'PACIENTES.ID_LOCALIZACAO')
                                ->where('PACIENTE_LOCALIZACAO.ID', '=', $paciente->ID_LOCALIZACAO)
                                ->select('PACIENTE_LOCALIZACAO.*')
                                ->get();

    foreach ($arrayPacientesLocalizacao as $arrayPacienteLocalizacao) {
        $pacienteLocalizacao = $arrayPacienteLocalizacao;
    }

    $arrayCidades = $this->objCidades
                ->where('CIDADES.ID','=', $request->pacienteCidade)
                ->get();

    
    foreach ($arrayCidades as $arrayCidade) {
        $cidade = $arrayCidade;
    }

    //Aqui precisar fazer a logica para calcular os valores da propostas.
    $valor = 100;

    DB::beginTransaction();
        
        try {

            $idPrestadores = explode(",",$request->idPrestadores);

            $idServicos = implode(",",$request->servicos);
            
            foreach ($idPrestadores as $idPrestador) {
                
                $arrayPrestadores = $this->objPrestador
                    ->where('PRESTADORES.ID', '=', $idPrestador)
                    ->get();
                
                foreach ($arrayPrestadores as $arrayPrestador) {
                    $prestador = $arrayPrestador;

                    $proposta = $this->objProposta->create([
                        'ID_PRESTADOR' => $prestador->ID,
                        'NOME_PRESTADOR' =>$prestador->NOME,
                        'ID_SOLICITANTE' => $solicitante->ID,
                        'NOME_SOLICITANTE' => $solicitante->NOME,
                        'ID_PACIENTE' => $paciente->ID,
                        'NOME_PACIENTE' => $paciente->NOME,
                        'TIPO' => $pacienteTipo->TIPO,
                        'LOCALIZACAO' => $pacienteLocalizacao->LOCALIZACAO,
                        'CEP' => $request->pacienteCep, 
                        'ENDERECO' => $request->pacienteEndereco,
                        'NUMERO' => $request->pacienteNumero,
                        'COMPLEMENTO' => $request->pacienteComplemento,
                        'BAIRRO' => $request->pacienteBairro,
                        'CIDADE' => $cidade->CIDADE,
                        'UF' => $cidade->UF,
                        'SERVICOS' => $idServicos,
                        'SERVICOS_OUTROS' => $request->servicoOutros,
                        'TOMA_MEDICAMENTOS' => $request->tomaMedicamento,
                        'TIPO_MEDICAMENTOS' => $request->tipoMedicamento,
                        'DATA_SERVICO' => $request->dataServico,
                        'HORA_INICIO' => $request->horaInicio,
                        'HORA_FIM' => $request->horaFim,
                        'VALOR' => $valor
                    ]);
                }
               DB::commit();
            };
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            dd('Deu ruim');
        }
    }

    public function servicosPrestados()
    {
        return view('servicos/servicosPrestados');
    }


    public function servicosContratados()
    {
        return view('servicos/servicosContratados');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
