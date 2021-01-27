<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestSolicitantePaciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\solicitantes;
use App\Models\pacientes;
use App\Models\estados;
use App\Models\cidades;
use App\Models\servicos;
use App\Models\enderecos;
use App\Models\paciente_tipo;
use App\Models\paciente_localizacao;
use App\Models\familiaridade;
use App\Models\user;
use App\Models\proposta;
use App\Models\registros_log;
use App\Config\constants;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class solicitantesController extends Controller
{
     //Variaveis que vão receber os objetos do model
    private $objSolicitante;
    private $objPaciente;
    private $objEstados;
    private $objCidades;
    private $objPacienteTipo;
    private $objPacienteLocalizacao;
    private $objFamiliaridade;
    private $objUsers;

    //Instanciando as classes
    public function __construct()
    {
        $this->objSolicitante = new solicitantes();
        $this->objProposta = new proposta();  
        $this->objPaciente = new pacientes();
        $this->objEstados = new estados();
        $this->objCidades = new cidades();
        $this->objEndereco = new enderecos();
        $this->objServico = new servicos();
        $this->objPacienteTipo = new paciente_tipo();
        $this->objPacienteLocalizacao = new paciente_localizacao();
        $this->objFamiliaridade = new familiaridade(); 
        $this->objUsers = new user();
        $this->objRegistros = new registros_log(); 
        
    }
    
    public function index()
    {
           
        $solicitante = $this->objSolicitante->all();

        return view('solicitantes/index',compact('solicitante'));
        
    }

    public function dadosCadastrais()
    {
        // Encontra o solicitante pelo usuario logado.
        $solicitantes = $this->objSolicitante->where('ID_USUARIO', auth()->user()->id)->get();

        return view('solicitantes/cadastro',compact("solicitantes"));
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

        $familiaridades=$this->objFamiliaridade->all(); 

        return view('solicitantes/create',compact('estados','cidades','familiaridades','pacienteTipo','pacienteLocalizacao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\requestSolicitantePaciente; $request
     * @return \Illuminate\Http\Response
     */
    public function store(requestSolicitantePaciente $request)
    {
        // Pegando o valor da constant para colocar no solicitante
        $status = \Config::get('constants.STATUS.ATIVO');

        DB::beginTransaction();

        try {           
            
            $enderecoSolicitante = $this->objEndereco->create([
                'CEP' => $request->solicitanteCep,
                'ENDERECO' => $request->solicitanteEndereco,
                'NUMERO' => $request->solicitanteNumero,
                'COMPLEMENTO' => $request->solicitanteComplemento,
                'BAIRRO' => $request->solicitanteBairro,
                'ID_CIDADE' => $request->solicitanteCidade,
                'ID_ESTADO' => $request->solicitanteEstado,
            ]);

            //Gravando o id do endereco
            $idEnderecoSolicitante = $enderecoSolicitante->id;

            $usuario = $this->objUsers->create([
                'name' => $request->solicitanteNome,
                'email' => $request->solicitanteEmail,
                'password' => Hash::make($request['solicitanteSenha']),
                'status' => $status,
            ]);
            
            //Gravando a função no usuario
            $usuario->assignRole('solicitante');
            
            //Gravando o id do usuario
            $idUsuario = $usuario->id;
    
            $solicitante = $this->objSolicitante->create([
                'NOME' => $request->solicitanteNome,
                'CPF' => $request->solicitanteCPF,
                'EMAIL' => $request->solicitanteEmail,
                'TELEFONE' => $request->solicitanteTelefone,
                'ID_USUARIO' => $idUsuario,
                'ID_ENDERECO' => $idEnderecoSolicitante,
                ]);

            //Gravando o id do solicitante
            $idSolicitante = $solicitante->id;

            if($solicitante) {
            // Pegando informações para popular no registro
            $dataHora = date('d/m/Y \à\s H:i:s');

            $nomeUsuario = $usuario->name;
                
            $textoRegistro = 'Cadastro de '.$nomeUsuario.' realizado com sucesso'; 

            $registro = $this->objRegistros->create([
                'DATA' => $dataHora,
                'TEXTO' => $textoRegistro,
                'ID_USUARIO' => $idUsuario
            ]);

            }
            
            $enderecoPaciente = $this->objEndereco->create([
                'CEP' => $request->pacienteCep,
                'ENDERECO' => $request->pacienteEndereco,
                'NUMERO' => $request->pacienteNumero,
                'COMPLEMENTO' => $request->solicitanteComplemento,
                'BAIRRO' => $request->pacienteBairro,
                'ID_CIDADE' => $request->pacienteCidade,
                'ID_ESTADO' => $request->pacienteEstado,
            ]);
            
            //Gravando o id do endereco
            $idEnderecoPaciente = $enderecoPaciente->id;
            
            $paciente = $this->objPaciente->create([
                'NOME' => $request->pacienteNome,
                'ID_TIPO' => $request->pacienteTipo,
                'ID_LOCALIZACAO' => $request->pacienteLocalizacao,
                'ID_ENDERECO' => $idEnderecoPaciente,
                'TOMA_MEDICAMENTOS' => $request->tomaMedicamento,
                'TIPO_MEDICAMENTOS' => $request->tipoMedicamento,
                'ID_SOLICITANTE' => $idSolicitante,
                'STATUS' => $status,
                'ID_FAMILIARIDADE' => $request->familiaridade,
                'FAMILIAR_OUTROS' => $request->familiaridadeOutros,
                ]);
            
            if($paciente) {
                // Pegando informações para popular no registro
                $dataHora = date('d/m/Y \à\s H:i:s');
    
                $nomeUsuario = $paciente->NOME;
                    
                $textoRegistro = 'Cadastro do paciente '.$nomeUsuario.' realizado com sucesso'; 
    
                $registro = $this->objRegistros->create([
                    'DATA' => $dataHora,
                    'TEXTO' => $textoRegistro,
                    'ID_USUARIO' => $idUsuario
                ]);
    
                }
                  
            DB::commit();

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
        
        $solicitante=$this->objSolicitante->find($id);
        
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
        $solicitantes= $this->objSolicitante->find($id);

        $users = $solicitantes->find($solicitantes->ID)
        ->relUsuario;

        $enderecos = $solicitantes->find($solicitantes->ID)
        ->relEndereco;

        $cidades = $this->objCidades->all();

        $estados = $this->objEstados->all();

        return view('solicitantes/edit',compact('solicitantes','users','enderecos','cidades','estados'));

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
        $solicitantes= $this->objSolicitante->find($id);

        DB::beginTransaction();

        try {           

            $this->objEndereco->where(['ID' => $solicitantes->ID_ENDERECO])->update([
                'CEP' => $request->solicitanteCep,
                'ENDERECO' => $request->solicitanteEndereco,
                'NUMERO' => $request->solicitanteNumero,
                'COMPLEMENTO' => $request->solicitanteComplemento,
                'BAIRRO' => $request->solicitanteBairro,
                'ID_CIDADE' => $request->solicitanteCidade,
                'ID_ESTADO' => $request->solicitanteEstado,
            ]);

            $this->objUsers->where(['id' => $solicitantes->ID_USUARIO])->update([
                'name' => $request->solicitanteNome,
            ]);

            $this->objSolicitante->where(['ID' => $solicitantes->ID])->update([
                'NOME' => $request->solicitanteNome,
                'CPF' => $request->solicitanteCPF,
                'TELEFONE' => $request->solicitanteTelefone,
                ]);

            // Pegando informações para popular no registro
            $dataHora = date('d/m/Y \à\s H:i:s');

            $nomeUsuario = $solicitantes->NOME;
                
            $textoRegistro = 'Cadastro de '.$nomeUsuario.' alterado com sucesso'; 

            $registro = $this->objRegistros->create([
                'DATA' => $dataHora,
                'TEXTO' => $textoRegistro,
                'ID_USUARIO' => $solicitantes->ID_USUARIO
            ]);
            
            DB::commit();

            return redirect()->action('solicitantesController@dadosCadastrais');

            
        } catch (\Throwable $e) {


            DB::rollback();
            report($e);
            return false;
    
        }
        return redirect('solicitantes');
    }

    public function solicitantePropostas()
    {

        $propostaAceita = \Config::get('constants.SERVICOS.ACEITADO');

        $propostas = $this->objProposta
                        ->join('SOLICITANTES','PROPOSTAS.ID_SOLICITANTE','=','SOLICITANTES.ID')
                        ->join('PRESTADORES','PROPOSTAS.ID_PRESTADOR','=','PRESTADORES.ID')
                        ->join('FORMACAO','PRESTADORES.ID_FORMACAO','=','FORMACAO.ID')
                        ->where('SOLICITANTES.ID_USUARIO', auth()->user()->id)
                        ->where('PROPOSTAS.APROVACAO_PRESTADOR', '=', $propostaAceita)
                        ->whereNull('PROPOSTAS.APROVACAO_SOLICITANTE')
                        ->select('PROPOSTAS.*','PRESTADORES.TELEFONE','FORMACAO.FORMACAO')
                        ->get();

        $servicos=$this->objServico->all();

        return view('solicitantes/propostas',compact('propostas','servicos'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
