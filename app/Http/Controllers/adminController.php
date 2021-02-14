<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestAdmin;
use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\user;
use App\Models\estados;
use App\Models\cidades;
use App\Models\enderecos;
use App\Models\registros_log;
use Illuminate\Support\Facades\Hash;
use App\Config\constants;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{

    private $admin;

    public function __construct()
    {
        $this->objAdmin = new admin();
        $this->objUsers = new user();
        $this->objEstados = new estados();
        $this->objCidades = new cidades();
        $this->objEndereco = new enderecos();
        $this->objRegistros = new registros_log(); 

    }
    public function index()
    {
        $admin = $this->objAdmin->all();
        return view('admin/index',compact('admin'));
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

    public function dadosCadastrais()
    {
        $arrayAdmin = $this->objAdmin->where('ID_USUARIO', auth()->user()->id)->get();
        return view('admin/cadastro',compact('arrayAdmin'));
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

        return view('admin/create',compact('estados','cidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(requestAdmin $request)
    {
        // Pegando o valor da constant para colocar no prestador
        $status = \Config::get('constants.STATUS.ATIVO');

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
            
            $idEnderecoAdmin = $enderecoAdmin->id;
            
            $usuario = $this->objUsers->create([
                'name' => $request->adminNome,
                'email' => $request->adminEmail,
                'password' => Hash::make($request['adminSenha']),
                'status' => $status
            ]);

            $usuario->assignRole('administrador');

            //Gravando o id do usuario
            $idUsuario = $usuario->id;

            $admin = $this->objAdmin->create([
                'NOME' => $request->adminNome,
                'CPF' => $request->adminCPF,
                'EMAIL' => $request->adminEmail,
                'TELEFONE' => $request->adminTelefone,
                'ID_ENDERECO' => $idEnderecoAdmin,
                'ID_USUARIO' => $idUsuario,
            ]);

            // Pegando informações para popular no registro
            // $dataHora = date('d/m/Y \à\s H:i:s');

            // $nomeUsuario = $usuario->name;

            // $arrayUsuariosAdmins = $this->objAdmin
            //                         ->where('ID_USUARIO', auth()->user()->id)
            //                         ->get();

            // foreach ($arrayUsuariosAdmins as $arrayUsuarioAdmin) {
            //     $usuarioAdmin = $arrayUsuarioAdmin;
            // }
                
            // $textoRegistro = 'Cadastro de '.$nomeUsuario.' realizado com sucesso pelo administrator '.$usuarioAdmin->NOME.''; 

            // $registro = $this->objRegistros->create([
            //     'DATA' => $dataHora,
            //     'TEXTO' => $textoRegistro,
            //     'ID_USUARIO' => $idUsuario
            // ]);

            DB::commit();

            return redirect()->action('adminController@listaAdmins');

        } catch (\Throwable $th) {
            
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
        $admin=$this->objAdmin->find($id);
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
        $admin=$this->objAdmin->find($id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objAdmin->destroy($id);
        return($del)?"sim":"não";
    }
}
