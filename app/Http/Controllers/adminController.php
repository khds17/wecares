<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\user;
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
        return view('admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Pegando o valor da constant para colocar no prestador
        $status = \Config::get('constants.STATUS.ATIVO');

        $usuario = $this->objUsers->create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request['senha']),
            'status' => $status
        ]);

        $usuario->assignRole('administrador');

        $idUsuario = $usuario->id;

        $admin = $this->objAdmin->create([
            'NOME' => $request->nome,
            'EMAIL' => $request->email,
            'ID_USUARIO' => $idUsuario,
        ]);
        

        if($admin){
            return redirect('admin');
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
