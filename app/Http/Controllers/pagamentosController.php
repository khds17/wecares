<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\solicitantes;

class pagamentosController extends Controller
{

        //Instanciando as classes
        public function __construct()
        {
            $this->objSolicitante = new solicitantes();            
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Encontra o solicitante pelo usuario logado.
        $solicitantes = $this->objSolicitante->where('ID_USUARIO', auth()->user()->id)->get();

        return view('pagamentos/index', compact('solicitantes'));
    }

    public function processPayment(Request $request)
    {
        \MercadoPago\SDK::setAccessToken("TEST-2933194983833876-020323-4c2e29596cb229a47df6e98bfd6efb24-200979127");

        $customer = new \MercadoPago\Customer();
        $customer->email = $request->email;
        dd($customer);
        $customer->save();

        // dd($customer);
      
        $card = new \MercadoPago\Card();
        $card->token = $request->token;

        if($request->paymentMethodId == "master") {
            $card->issuer = $request->issuer;
        }
        $card->customer_id = $customer->id();

        $card->save();

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
