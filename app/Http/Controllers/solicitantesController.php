<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\solicitante;


class solicitantesController extends Controller
{

    private $solicitante;

    public function __construct()
    {
        $this->solicitante = new solicitante();
    }
    
    public function index()
    {
        
        $solicitante = $this->solicitante->all();
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
        return view('solicitantes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solicitante = $this->solicitante->create([
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
