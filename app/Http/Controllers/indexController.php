<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\servicos;

class indexController extends Controller
{
    //Instanciando as classes
    public function __construct()
    {
        $this->objServico = new servicos();
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index/index');
    }

    public function sobre()
    {
        return view('index/sobre');
    }

    public function termos()
    {
        return view('index/termos');
    }

    public function conduta()
    {
        return view('index/conduta');
    }

    public function privacidade()
    {
        return view('index/privacidade');
    }

    public function login()
    {
        return view('index/login');
    }

    public function agradecimento()
    {
        return view('index/agradecimento-cadastro');
    }

    public function encontrecuidador()
    {
        return view('index/encontre-cuidador');
    }

    public function resultado()
    {
        $servicos=$this->objServico->all();
        return view('index/resultado-cuidador',compact('servicos'));
    }

    public function perfil()
    {
        return view('index/perfil-cuidador');
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
