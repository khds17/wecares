<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\solicitante;


class solicitanteController extends Controller
{

    private $solicitante;

    public function __construct()
    {
        $this->solicitante = new solicitante();
    }
    
    public function index()
    {
        
        $solicitante = $this->solicitante->all();
        return view('solicitante/index',compact('solicitante'));
        
    }

    public function dadosCadastrais()
    {
        return view('solicitante/cadastro');
    }

    public function servicosContratados()
    {
        return view('solicitante/servicosContratados');
    }

    public function pacienteCadastro()
    {
        return view('solicitante/paciente');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('solicitante/create');
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
            return redirect('solicitante');
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
        return view('solicitante/information',compact('solicitante'));
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
        return view('solicitante/create',compact('edit'));

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
        return redirect('solicitante');
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
