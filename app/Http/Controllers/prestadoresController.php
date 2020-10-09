<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\prestadores;
use App\Models\estados;
use App\Models\cidades;
use App\Models\enderecos;
use App\Models\certificados;
use App\Models\antecedentes;

const PENDENTE = 0; 
const ATIVO = 1;
const REPROVADO = 2;


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


    //Instanciando as classes
    public function __construct()
    {
        $this->objPrestador = new prestadores();
        $this->objEstado = new estados();
        $this->objCidade = new cidades();
        $this->objEndereco = new enderecos();
        $this->objCertificado = new certificados();
        $this->objAntecedente = new antecedentes();
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
        $cidades=$this->objCidade->all();
        return view('prestadores/create',compact('estados','cidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $endereco = $this->objEndereco->create([
            'CEP'=>$request->prestadorCep,
            'ENDERECO'=>$request->prestadorEndereco,
            'NUMERO'=>$request->prestadorNumero,
            'COMPLEMENTO'=>$request->prestadorComplemento,
            'BAIRRO'=>$request->prestadorBairro,
            'ID_CIDADE'=>$request->prestadorCidade,
            'ID_ESTADO'=>$request->prestadorEstado,
        ]);
        
        $certificado = $this->objCertificado->create([
            'CERTIFICADO'=>$request->certificadoFormacao->store('certificados')
        ]);

        $antecedente = $this->objAntecedente->create([
            'ANTECEDENTE'=>$request->antecedentes->store('antecedentes')
        ]);

        $prestador = $this->objPrestador->create([
            'NOME'=>$request->prestadorNome,
            'CPF'=>$request->prestadorCPF,
            'TELEFONE'=>$request->prestadorNumero,
            'DT_NASCIMENTO'=>$request->prestadorNascimento,
            'SEXO'=>$request->sexo,
            'EMAIL'=>$request->prestadorEmail,
            'SENHA'=>$request->prestadorSenha,
            'FORMACAO'=>$request->formacao,
            'ID_CERTIFICADO'=>$request->certificadoFormacao,
            'ID_ANTEDECENTE'=>$request->antecedentes,
            'STATUS'=>$request->self::PENDENTE
        ]);
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
