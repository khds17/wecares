<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\solicitante;
use App\Models\estados;
use App\Models\cidades;


class solicitantesController extends Controller
{
     //Variaveis que vão receber os objetos do model
    private $objSolicitante;
    private $objEstados;
    private $objCidades;

    //Instanciando as classes
    public function __construct()
    {
        $this->objSolicitante = new solicitante();
        $this->objEstados = new estados();
        $this->objCidades = new cidades();
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
        return view('solicitantes/create',compact('estados','cidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solicitante = $this->objSolicitante->create([
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
