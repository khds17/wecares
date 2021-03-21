<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\prestadores;	
use App\Models\bancos;	
use App\Models\conta_recebimento;	
use App\Config\constants;	
use Illuminate\Support\Facades\DB;

class ReceiptsController extends Controller
{

    //Instanciando as classes	
    public function __construct()	
    {	
        $this->objPrestador = new prestadores();	
        $this->objBancos = new bancos();   	
        $this->objContaRecebimento = new conta_recebimento(); 	
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Encontra o prestador pelo usuario logado.	
        $arrayPrestadores = $this->objPrestador->where('ID_USUARIO', auth()->user()->id)	
                                            ->get();	

        foreach ($arrayPrestadores as $arrayPrestador) {	
            $prestador = $arrayPrestador;	
        }	

        //Pegando todas as contas de recebimento que o cliente informou	
        $contasRecebimento = $this->objContaRecebimento	
                                ->join('BANCOS','CONTA_RECEBIMENTO.ID_BANCO','=','BANCOS.ID')	
                                ->where('CONTA_RECEBIMENTO.ID_PRESTADOR','=',$prestador->ID)	
                                ->select('CONTA_RECEBIMENTO.*','BANCOS.BANCO')
                                ->get();

        return view('recebimentos/index',compact('contasRecebimento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Pegando todos os bancos para disponibilizar na view	        //
        $bancos = $this->objBancos->all();		

        return view('recebimentos/create',compact('bancos'));	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Encontra o prestador pelo usuario logado.	        //
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
            $contaPagamento = $this->objContaRecebimento->create([	
                'AGENCIA' => $request->agencia,	
                'CONTA' => $request->conta,	
                'TIPO_CONTA' => $request->tipo_conta,	
                'STATUS' => $status,	
                'PRINCIPAL' => $request->contaRecebimentoPrincipal,
                'ID_BANCO' => $request->banco,	
                'ID_PRESTADOR' => $prestador->ID,	
            ]);	

            DB::commit();	

            return redirect('/recebimentos');	

        } catch (\Throwable $th) {	
            DB::rollback();	
            return redirect('/recebimentos');	
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
        //Pegando todos os bancos para disponibilizar na view
        $bancos = $this->objBancos->all();

        //Pegando todas as contas de recebimento que o cliente informou
        $contaRecebimento = $this->objContaRecebimento->find($id);
                
        return view('recebimentos/edit',compact('bancos','contaRecebimento'));
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

        DB::beginTransaction();

        try {	
            //Cadastro da conta de recebimento dos prestadores	
            $this->objContaRecebimento->where(['ID' => $id])->update([
                'AGENCIA' => $request->agencia,	
                'CONTA' => $request->conta,	
                'TIPO_CONTA' => $request->tipo_conta,	
                'ID_BANCO' => $request->banco,	
                'PRINCIPAL' => $request->contaRecebimentoPrincipal,
            ]);	

            DB::commit();	

            return redirect('/recebimentos');	

        } catch (\Throwable $th) {	
            DB::rollback();	
            return redirect('/recebimentos');	
        }

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
