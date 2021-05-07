<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\servicos;
use App\Models\registros_log;
use App\Models\prestadores;
use App\Models\pacientes;
use App\Models\foto;
use App\Models\paciente_tipo;
use App\Models\paciente_localizacao;
use App\Models\enderecos;
use App\Models\cidades;
use App\Models\estados;
use App\Models\familiaridade;

class IndexController extends Controller
{
    //Instanciando as classes
    public function __construct()
    {
        $this->objServico = new servicos();
        $this->objRegistros = new registros_log();
        $this->objPrestador = new prestadores();
        $this->objPacientes = new pacientes();
        $this->objFotos = new foto();
        $this->objPacienteTipo = new paciente_tipo();
        $this->objPacienteLocalizacao = new paciente_localizacao();
        $this->objEndereco = new enderecos();
        $this->objCidade = new cidades();
        $this->objEstado = new estados();
        $this->objFamiliaridades = new familiaridade();

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

    public function encontreCuidador()
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

    public function resultado(Request $request)
    {
        $ativo = \Config::get('constants.STATUS.ATIVO');

        if($request->id) {
            $idCidade = $request->id;

            $prestadores = $this->objPrestador
                                ->join('ENDERECOS', 'PRESTADORES.ID_ENDERECO', '=', 'ENDERECOS.ID')
                                ->join('FORMACAO', 'PRESTADORES.ID_FORMACAO', '=', 'FORMACAO.ID')
                                ->leftJoin('users', 'PRESTADORES.ID_USUARIO', '=', 'users.id')
                                ->leftJoin('FOTOS', 'PRESTADORES.ID_FOTO', '=', 'FOTOS.ID')
                                ->select('PRESTADORES.*','FORMACAO.FORMACAO', 'FOTOS.FOTO')
                                ->where('ENDERECOS.ID_CIDADE', '=', $idCidade)
                                ->where('users.status', '=', $ativo)
                                ->get();
        } else {
            $cidade = $request->cidade;

            $prestadores = $this->objPrestador
                            ->join('ENDERECOS', 'PRESTADORES.ID_ENDERECO', '=', 'ENDERECOS.ID')
                            ->join('CIDADES', 'ENDERECOS.ID_CIDADE', '=', 'CIDADES.ID')
                            ->join('FORMACAO', 'PRESTADORES.ID_FORMACAO', '=', 'FORMACAO.ID')
                            ->leftJoin('users', 'PRESTADORES.ID_USUARIO', '=', 'users.id')
                            ->leftJoin('FOTOS', 'PRESTADORES.ID_FOTO', '=', 'FOTOS.ID')
                            ->select('PRESTADORES.*','FORMACAO.FORMACAO', 'FOTOS.FOTO')
                            ->where('CIDADES.CIDADE', 'like', '%'.$cidade)
                            ->where('users.status', '=', $ativo)
                            ->get();
        }

        $cidades = $this->objCidade->all();

        $estados = $this->objEstado->all();

        $familiaridades=$this->objFamiliaridades->all();

        $servicos=$this->objServico->all();

        $pacientesTipos = $this->objPacienteTipo->all();

        $pacientesLocalizacao = $this->objPacienteLocalizacao->all();

        //Verifica se há algum prestador
        if(count($prestadores) >= 1) {
            return view('prestadores/resultado-prestadores',compact('servicos','prestadores','pacientesTipos','pacientesLocalizacao', 'cidades','estados','familiaridades'));
        } else {
            return view('prestadores/resultado-prestadores',compact('prestadores'));
        }

    }
}
