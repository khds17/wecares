<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;

class adminController extends Controller
{

    private $admin;

    public function __construct()
    {
        $this->admin = new admin();
    }
    public function index()
    {
        $admin = $this->admin->all();
        return view('admin/index',compact('admin'));
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
        $admin = $this->admin->create([
            'NOME'=>$request->nome,
            'EMAIL'=>$request->email,
            'SENHA'=>$request->senha,
            'SENHA_CONFIRMACAO'=>$request->senha_confirmacao,
            'STATUS'=>$request->status
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
        $admin=$this->admin->find($id);
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
        $edit=$this->admin->find($id);
        return view('admin/create',compact('edit'));
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
        $this->admin->where(['id'=>$id])->update([
            'NOME'=>$request->nome,
            'EMAIL'=>$request->email,
            'SENHA'=>$request->senha,
            'SENHA_CONFIRMACAO'=>$request->senha_confirmacao,
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
        $del=$this->admin->destroy($id);
        return($del)?"sim":"não";
    }
}
