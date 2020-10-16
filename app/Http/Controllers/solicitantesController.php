<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestSolicitantePaciente;
use Illuminate\Http\Request;
use App\Models\solicitantes;
use App\Models\pacientes;
use App\Models\estados;
use App\Models\cidades;
use App\Models\enderecos;
use App\Models\servicos;
use App\Models\paciente_tipo;
use App\Models\paciente_localizacao;
use App\Models\familiaridade;
use App\Config\constants;
use Illuminate\Support\Facades\DB;


class solicitantesController extends Controller
{
     //Variaveis que vão receber os objetos do model
    private $objSolicitante;
    private $objPaciente;
    private $objEstados;
    private $objCidades;
    private $objServico;
    private $objPacienteTipo;
    private $objPacienteLocalizacao;
    private $objFamiliaridade;

    //Instanciando as classes
    public function __construct()
    {
        $this->objSolicitante = new solicitantes();
        $this->objPaciente = new pacientes();
        $this->objEstados = new estados();
        $this->objCidades = new cidades();
        $this->objEndereco = new enderecos();
        $this->objServico = new servicos();
        $this->objPacienteTipo = new paciente_tipo();
        $this->objPacienteLocalizacao = new paciente_localizacao();
        $this->objFamiliaridade = new familiaridade(); 
        
    }
    
    public function index()
    {
           
        $solicitante = $this->objSolicitante->all();
        return view('solicitantes/index',compact('solicitante'));
        
    }

    public function dadosCadastrais()
    {
        return view('solicitantes/cadastro');
    }

    public function pacienteCadastro()
    {
        return view('solicitantes/paciente');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados=$this->objEstados->all();
        $cidades=$this->objCidades->all();
        $servicos=$this->objServico->all();
        $pacienteTipo=$this->objPacienteTipo->all();
        $pacienteLocalizacao=$this->objPacienteLocalizacao->all();
        $familiaridades=$this->objFamiliaridade->all(); 
        return view('solicitantes/create',compact('estados','cidades','servicos','familiaridades','pacienteTipo','pacienteLocalizacao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\requestSolicitantePaciente; $request
     * @return \Illuminate\Http\Response
     */
    public function store(requestSolicitantePaciente $request)
    {
        // Pegando o valor da constant
        $status = \Config::get('constants.ATIVO');

        $enderecoSolicitante = $this->objEndereco->create([
            'CEP'=>$request->solicitanteCep,
            'ENDERECO'=>$request->solicitanteEndereco,
            'NUMERO'=>$request->solicitanteNumero,
            'COMPLEMENTO'=>$request->solicitanteComplemento,
            'BAIRRO'=>$request->solicitanteBairro,
            'ID_CIDADE'=>$request->solicitanteCidade,
            'ID_ESTADO'=>$request->solicitanteEstado,
        ]);
        //Gravando o id do endereco
        $idEnderecoSolicitante = $enderecoSolicitante->id;

        $solicitante = $this->objSolicitante->create([
                'NOME'=>$request->solicitanteNome,
                'CPF'=>$request->solicitanteCPF,
                'EMAIL'=>$request->solicitanteEmail,
                'TELEFONE'=>$request->solicitanteNumero,
                'SENHA'=>$request->solicitanteSenha,
                'ID_ENDERECO'=>$idEnderecoSolicitante,
                'ID_FAMILIARIDADE'=>$request->familiaridade,
                'TIPO_FAMILIAR_OUTROS'=>$request->familiaridadeOutros,
                'STATUS'=>$status
            ]);
        //Gravando o id do solicitante
        $idSolicitante = $solicitante->id;

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
        
        $arrayServicos = $request->servicos;
        $servicos = json_encode($arrayServicos); 

        $paciente = $this->objPaciente->create([
            'NOME'=>$request->pacienteNome,
            'ID_TIPO'=>$request->pacienteTipo,
            'ID_LOCALIZACAO'=>$request->pacienteLocalizacao,
            'ID_ENDERECO'=>$idEnderecoPaciente,
            'SERVICOS'=>$servicos,
            'TOMA_MEDICAMENTOS'=>$request->tomaMedicamento,
            'TIPO_MEDICAMENTOS'=>$request->tipoMedicamento,
            'STATUS'=>$status,
            'ID_SOLICITANTE'=>$idSolicitante,
            ]);

        if($solicitante){
            return redirect('solicitantes');
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
        
        $solicitante=$this->solicitante->find($id);
        return view('solicitantes/information',compact('solicitante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=$this->solicitante->find($id);
        return view('solicitantes/create',compact('edit'));

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
        $this->solicitante->where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'email'=>$request->email,
            'cep'=>$request->cep,
            'endereco'=>$request->endereco,
            'numero'=>$request->numero,
            'cidade'=>$request->cidade,
            'bairro'=>$request->bairro,
            'complemento'=>$request->complemento,
            'estado'=>$request->estado,
            'nivelfamiliaridade'=>$request->nivelfamiliaridade,
            'nivelfamiliaridadeoutros'=>$request->nivelfamiliaridadeoutros,
            'status'=>$request->status
        ]);
        return redirect('solicitantes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->solicitante->destroy($id);
        return($del)?"sim":"não";
    }
}
