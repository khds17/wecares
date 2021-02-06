<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\prestadores;
use App\Models\bancos;
use App\Models\contas_pagamento;
use App\Config\constants;
use Illuminate\Support\Facades\DB;

class recebimentosController extends Controller
{

        //Instanciando as classes
        public function __construct()
        {
            $this->objPrestador = new prestadores();
            $this->objBancos = new bancos();   
            $this->objContasPagamentos = new contas_pagamento(); 
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // // Encontra o prestador pelo usuario logado.
        // $prestadores = $this->objPrestador->where('ID_USUARIO', auth()->user()->id)->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Pegando todos os bancos para disponibilizar na view
        $bancos = $this->objBancos->all();

        // Encontra o prestador pelo usuario logado.
        $arrayPrestadores = $this->objPrestador->where('ID_USUARIO', auth()->user()->id)
                                                ->get();

        foreach ($arrayPrestadores as $arrayPrestador) {
            $prestador = $arrayPrestador;
        }

        //Pegando todas as contas de recebimento que o cliente informou
        $contasRecebimento = $this->objContasPagamentos
                                ->join('BANCOS','CONTA_PAGAMENTOS.ID_BANCO','=','BANCOS.ID')
                                ->where('CONTA_PAGAMENTOS.ID_PRESTADOR','=',$prestador->ID)
                                ->get();

        return view('recebimentos/create',compact('bancos','contasRecebimento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Encontra o prestador pelo usuario logado.
        $arrayPrestadores = $this->objPrestador->where('ID_USUARIO', auth()->user()->id)
                                          ->get();

        foreach ($arrayPrestadores as $arrayPrestador) {
            $prestador = $arrayPrestador;
        }
                                                  // Pegando o valor da constant para colocar no prestador
        $status = \Config::get('constants.STATUS.ATIVO');

        DB::beginTransaction();
        
        try {
            //Cadastro da conta de recebimento dos prestadores
            $contaPagamento = $this->objContasPagamentos->create([
                'AGENCIA' => $request->agencia,
                'CONTA' => $request->conta,
                'TIPO_CONTA' => $request->tipo_conta,
                'STATUS' => $status,
                'ID_BANCO' => $request->banco,
                'ID_PRESTADOR' => $prestador->ID,
            ]);

            DB::commit();

            return redirect('/recebimentos/create');

        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('/recebimentos/create');
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
