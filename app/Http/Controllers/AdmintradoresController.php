<?php

namespace App\Http\Controllers;

use App\Http\Requests\Administrador;
use Illuminate\Http\Request;
use App\Models\Administradores;
use App\Models\User;
use App\Models\prestadores;
use App\Models\estados;
use App\Models\cidades;
use App\Models\enderecos;
use App\Models\registros_log;
use Illuminate\Support\Facades\Hash;
use App\Config\constants;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class AdmintradoresController extends Controller
{
    public function __construct()
    {
        $this->objAdmin = new Administradores();
        $this->objUsers = new User();
        $this->objEstados = new estados();
        $this->objCidades = new cidades();
        $this->objEndereco = new enderecos();
        $this->objRegistros = new registros_log();
        $this->objPrestador = new prestadores();
    }
    public function index()
    {
        return view('admin/index');
    }

    public function listaAdmins()
    {
        $admin = $this->objAdmin->all();

        return view('admin/lista-admins',compact('admin'));
    }

    public function listaServicosPrestados()
    {
        return view('admin/lista-servicos-prestados');
    }

    public function cadastroAdmin()
    {
        $arrayAdmin = $this->objAdmin
                        ->where('ID_USUARIO', auth()->user()->id)
                        ->get();

        return view('admin/cadastro',compact('arrayAdmin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = $this->objEstados->all();

        $cidades = $this->objCidades->orderBy('CIDADE','asc')->get();

        return view('admin/create',compact('estados','cidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Administrador $request)
    {
        DB::beginTransaction();

        try {
            $enderecoAdmin = $this->objEndereco->create([
                'CEP' => $request->adminCep,
                'ENDERECO' => $request->adminEndereco,
                'NUMERO' => $request->adminNumero,
                'COMPLEMENTO' => $request->adminComplemento,
                'BAIRRO' => $request->adminBairro,
                'ID_CIDADE' => $request->adminCidade,
                'ID_ESTADO' => $request->adminEstado,
            ]);

            $usuario = $this->objUsers->create([
                'name' => $request->adminNome,
                'email' => $request->adminEmail,
                'password' => Hash::make($request['adminSenha']),
                'status' => \Config::get('constants.STATUS.ATIVO')
            ]);

            $usuario->assignRole('administrador');

            $this->objAdmin->create([
                'NOME' => $request->adminNome,
                'CPF' => $request->adminCPF,
                'EMAIL' => $request->adminEmail,
                'TELEFONE' => $request->adminTelefone,
                'ID_ENDERECO' => $enderecoAdmin->id,
                'ID_USUARIO' => $usuario->id,
            ]);

            //Registro de criação
            $this->objRegistros->create([
                'DATA' => date('d/m/Y \à\s H:i:s'),
                'TEXTO' => 'Cadastro de '.$usuario->name.' realizado com sucesso pelo administrator '.auth()->user()->name.'',
                'ID_USUARIO' => $usuario->id
            ]);

            DB::commit();

            return redirect()->action('AdmintradoresController@listaAdmins');

        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->action('AdmintradoresController@create');
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
        $admin = $this->objAdmin->find($id);

        return view('admin/information',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = $this->objAdmin->find($id);

        return view('admin/edit',compact('admin'));
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
        $this->objAdmin->where(['id'=>$id])->update([
            'NOME'=>$request->nome,
            'EMAIL'=>$request->email,
            'SENHA'=>$request->senha,
            'STATUS'=>$request->status
        ]);
        return redirect('admin');
    }

    public function prestadoresLista()
    {
        $prestadores = $this->objPrestador
                        ->join('users','PRESTADORES.ID_USUARIO','=','users.id')
                        ->where('users.status', '=', 0)
                        ->select('PRESTADORES.*')
                        ->get();

        return view('prestadores/lista-prestadores',compact('prestadores'));
    }

    public function aprovarPrestador($id)
    {
        DB::beginTransaction();

        try {
            $this->objUsers->where(['ID'=>$id])->update([
                'status' => \Config::get('constants.STATUS.ATIVO')
            ]);
            $user = $this->objUsers->find($id);

            $prestador = $user->find($id)
                            ->relPrestador;

            $this->objRegistros->create([
                'DATA' => date('d/m/Y \à\s H:i:s'),
                'TEXTO' => 'Prestador#'.$prestador->ID.' '.$prestador->NOME.' aprovado pelo administrador '.auth()->user()->name,
                'ID_USUARIO' => auth()->user()->id
            ]);

            $email = new EmailsController($prestador);
            $email->aceiteCadastroPrestador();

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            DB::rollback();
            return false;
        }
    }

    public function reprovarPrestador($id)
    {
        DB::beginTransaction();

        try {
            $this->objUsers->where(['ID'=>$id])->update([
                'status' => \Config::get('constants.STATUS.REPROVADO')
            ]);

            $user = $this->objUsers->find($id);

            $prestador = $user->find($id)
                            ->relPrestador;

            $this->objRegistros->create([
                'DATA' => date('d/m/Y \à\s H:i:s'),
                'TEXTO' => 'Prestador#'.$prestador->ID.' '.$prestador->NOME.' reprovada pelo administrador '.auth()->user()->name,
                'ID_USUARIO' => auth()->user()->id
            ]);

            $email = new EmailsController($prestador);
            $email->recusaCadastroPrestador();

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            DB::rollback();
            return false;
        }

    }
}
