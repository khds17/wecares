<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\servicos;
use App\Models\cidades;
use App\Models\registros_log;


class indexController extends Controller
{
    //Instanciando as classes
    public function __construct()
    {
        $this->objServico = new servicos();
        $this->objRegistros = new registros_log();

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

    public function registros()
    {
        $registros = $this->objRegistros
                        ->where('REGISTROS_LOG.ID_USUARIO', auth()->user()->id)
                        ->get();

        return view('registros/registros',compact('registros'));
    }

    public function cuidadorCidades(Request $request)
    {
        $search = $request->search;

        $search = $request->get('term');

        $result = Cidades::orderBy('CIDADE','asc')->select('ID','CIDADE')->where('CIDADE', 'LIKE', '%' .$search . '%')->limit(5)->get();

        return response()->json($result);

    }
}
