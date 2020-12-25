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
                        ->join('PACIENTES_TIPOS', 'PACIENTES.ID_TIPO', '=', 'PACIENTES_TIPOS.ID')
                        ->join('PACIENTE_LOCALIZACAO', 'PACIENTES.ID_LOCALIZACAO', '=', 'PACIENTE_LOCALIZACAO.ID')
                        ->join('users', 'SOLICITANTES.ID_USUARIO', '=', 'users.id')
                        ->where('SOLICITANTES.ID_USUARIO', auth()->user()->id)
                        ->select('PACIENTES.*','PACIENTES_TIPOS.TIPO','PACIENTE_LOCALIZACAO.LOCALIZACAO')
                        ->get();

        return view('pacientes/index',compact("pacientes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $estados=$this->objEstados->all();

        $cidades=$this->objCidades->orderBy('CIDADE','asc')->get();

        $pacienteTipo=$this->objPacienteTipo->all();

        $pacienteLocalizacao=$this->objPacienteLocalizacao->all();

        $familiaridades=$this->objFamiliaridades->all(); 

        return view('pacientes/create',compact('estados','cidades','familiaridades','pacienteTipo','pacienteLocalizacao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Pegando o valor da constant para colocar no solicitante
        $status = \Config::get('constants.STATUS.ATIVO');
        
        //Pega o solicitante logado
        $solicitantesArray = $this->objSolicitante->where('ID_USUARIO', auth()->user()->id)->get();

        DB::beginTransaction();

        try {
            // Tirando o solicitante do array
            foreach ($solicitantesArray as $solicitanteArray) {
                $solicitante = $solicitanteArray;
            }

            //Gravando o id do solicitante
            $idSolicitante = $solicitante->ID;
            
            $enderecoPaciente = $this->objEndereco->create([
                'CEP'=>$request->pacienteCep,
                'ENDERECO'=>$request->pacienteEndereco,
                'NUMERO'=>$request->pacienteNumero,
                'COMPLEMENTO'=>$request->solicitanteComplemento,
                'BAIRRO'=>$request->pacienteBairro,
                'ID_CIDADE'=>$request->pacienteCidade,
                'ID_ESTADO'=>$request->pacienteEstado,
            ]);
            
            //Gravando o id do endereco
            $idEnderecoPaciente = $enderecoPaciente->id;
            
            $paciente = $this->objPaciente->create([
                'NOME'=>$request->pacienteNome,
                'ID_TIPO'=>$request->pacienteTipo,
                'ID_LOCALIZACAO'=>$request->pacienteLocalizacao,
                'ID_ENDERECO'=>$idEnderecoPaciente,
                'TOMA_MEDICAMENTOS'=>$request->tomaMedicamento,
                'TIPO_MEDICAMENTOS'=>$request->tipoMedicamento,
                'ID_SOLICITANTE'=>$idSolicitante,
                'STATUS'=>$status,
                'ID_FAMILIARIDADE'=>$request->familiaridade,
                'FAMILIAR_OUTROS'=>$request->familiaridadeOutros,
                ]);
                  
            DB::commit();

            return redirect("/paciente");

        } catch (\Throwable $e) {
            DB::rollback();
            report($e);
            return false;
    
        }
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

    public function selectPacientes($id)
    {

        //Encontrando os pacientes do solicitante logado
        $paciente = $this->objPaciente->find($id);

        
        //Pegando todos os tipos de pacientes
        $pacientesTipos = $this->objPacienteTipo
                            ->join('PACIENTES', 'PACIENTES_TIPOS.ID', '=', 'PACIENTES.ID_TIPO')
                            ->where('PACIENTES_TIPOS.ID', '=', $paciente->ID_TIPO)
                            ->select('PACIENTES_TIPOS.*')
                            ->get();

        //Pegando todas as localizações
        $pacientesLocalizacao = $this->objPacienteLocalizacao
                                    ->join('PACIENTES', 'PACIENTE_LOCALIZACAO.ID', '=', 'PACIENTES.ID_LOCALIZACAO')
                                    ->where('PACIENTE_LOCALIZACAO.ID', '=', $paciente->ID_LOCALIZACAO)
                                    ->select('PACIENTE_LOCALIZACAO.*')
                                    ->get();

        
        // //Encontrando o endereço da localização dos pacientes
        $endereco = $paciente->find($paciente->ID)
                            ->relEndereco;

        // Colocando todos os dados em um array e retornando para o js
        $dadosPacientes = [
            'paciente' => $paciente,
            'pacientesTipos' => $pacientesTipos,
            'pacientesLocalizacao' => $pacientesLocalizacao,
            'endereco' => $endereco

        ];

        return $dadosPacientes;

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

        $familiaridades = $this->objFamiliaridades->all();

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
        $paciente = $this->objPaciente->find($id);

        DB::beginTransaction();

        try {          
            $this->objEndereco->where(['ID' => $paciente->ID_ENDERECO])->update([
                'CEP'=>$request->pacienteCep,
                'ENDERECO'=>$request->pacienteEndereco,
                'NUMERO'=>$request->pacienteNumero,
                'COMPLEMENTO'=>$request->pacienteComplemento,
                'BAIRRO'=>$request->pacienteBairro,
                'ID_CIDADE'=>$request->pacienteCidade,
                'ID_ESTADO'=>$request->pacienteEstado,
            ]);            

            $this->objPaciente->where(['ID' => $paciente->ID])->update([
                'NOME'=>$request->pacienteNome,
                'ID_TIPO'=>$request->pacienteTipo,
                'ID_LOCALIZACAO'=>$request->pacienteLocalizacao,
                'TOMA_MEDICAMENTOS'=>$request->tomaMedicamento,
                'TIPO_MEDICAMENTOS'=>$request->tipoMedicamento,
                'ID_FAMILIARIDADE'=>$request->familiaridade,
                'FAMILIAR_OUTROS'=>$request->familiaridadeOutros,
                ]);
           
            DB::commit();

            return redirect("/paciente");

            
        } catch (\Throwable $e) {

            dd('Deu ruim');
            DB::rollback();
            report($e);
            return false;
    
        }
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
