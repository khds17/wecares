<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestPrestador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\prestadores;
use App\Models\estados;
use App\Models\cidades;
use App\Models\enderecos;
use App\Models\certificados;
use App\Models\antecedentes;
use App\Models\formacao;
use App\Models\sexo;
use App\Config\constants;
use Illuminate\Support\Facades\DB;


class prestadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //Variaveis que vão receber os objetos do model
    private $objPrestador;
    private $objEstado;
    private $objCidade;
    private $objEndereco;
    private $objCertificado;
    private $objAntecedente;
    private $objFormacao;
    private $objSexos;


    //Instanciando as classes
    public function __construct()
    {
        $this->objPrestador = new prestadores();
        $this->objEstado = new estados();
        $this->objCidade = new cidades();
        $this->objEndereco = new enderecos();
        $this->objCertificado = new certificados();
        $this->objAntecedente = new antecedentes();
        $this->objFormacao = new formacao();
        $this->objSexos = new sexo();
    }

    public function index()
    {
        echo "Teste";
    }

    public function dadosCadastrais()
    {
        return view('prestadores/cadastro');
    }


    public function recebimentos()
    {
        return view('prestadores/recebimentos');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados=$this->objEstado->all();
        $cidades=$this->objCidade->orderBy('CIDADE','asc')->get();
        $formacoes=$this->objFormacao->all();
        $sexos=$this->objSexos->all();
        return view('prestadores/create',compact('estados','cidades','formacoes','sexos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \app\Http\Requests\requestPrestador  $request
     * @return \Illuminate\Http\Response
     */
    public function store(requestPrestador $request)
    {   
        // Pegando o valor da constant
        $status = \Config::get('constants.STATUS.PENDENTE');

        DB::beginTransaction();

        try {
            $endereco = $this->objEndereco->create([
                'CEP'=>$request->prestadorCep,
                'ENDERECO'=>$request->prestadorEndereco,
                'NUMERO'=>$request->prestadorNumero,
                'COMPLEMENTO'=>$request->prestadorComplemento,
                'BAIRRO'=>$request->prestadorBairro,
                'ID_CIDADE'=>$request->prestadorCidade,
                'ID_ESTADO'=>$request->prestadorEstado,
            ]);
            //Gravando o id do endereco
            $idEndereco = $endereco->id;
            
            $certificado = $this->objCertificado->create([
                'CERTIFICADO'=>$request->certificadoFormacao->store('certificados')
            ]);
            //Gravando o id do certificado
            $idCertificado = $certificado->id;
    
            $antecedente = $this->objAntecedente->create([
                'ANTECEDENTE'=>$request->antecedentes->store('antecedentes')
            ]);
            //Gravando o id do antecedente criminal
            $idAntedecente = $antecedente->id;
    
            // dd($idAntedecente);
    
            $prestador = $this->objPrestador->create([
                'NOME'=>$request->prestadorNome,
                'CPF'=>$request->prestadorCPF,
                'TELEFONE'=>$request->prestadorTelefone,
                'DT_NASCIMENTO'=>$request->prestadorNascimento,
                'ID_SEXO'=>$request->sexo,
                'EMAIL'=>$request->prestadorEmail,
                'SENHA'=>Hash::make($request['prestadorSenha']),
                'ID_FORMACAO'=>$request->formacao,
                'ID_CERTIFICADO'=>$idCertificado,
                'ID_ANTECEDENTE'=>$idAntedecente,
                'ID_ENDERECO'=>$idEndereco,
                'STATUS'=>$status
            ]);

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
