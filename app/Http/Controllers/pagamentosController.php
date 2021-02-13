<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\solicitantes;
use App\Models\cartoes;
use App\Models\valida_cartao;
use App\Config\constants;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class pagamentosController extends Controller
{

        //Instanciando as classes
        public function __construct()
        {
            $this->objSolicitante = new solicitantes();       
            $this->objCartoes = new cartoes();   
            $this->objValidaCartao = new valida_cartao();             
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

    public function processPaymentValidation(Request $request)
    {
        //Access token para utilizar o mercado pago
        \MercadoPago\SDK::setAccessToken("TEST-3508208613949405-021316-3288de42a43e89f96ce0a4a54a85533c-713881257");
               
        // Enviando o pagamento para mercado pago
        $payment = new \MercadoPago\Payment();
        $payment->transaction_amount = (float)$request->transactionAmount;
        $payment->token = $request->token;
        $payment->description = $request->description;
        $payment->installments = (int)$request->installments;
        $payment->payment_method_id = $request->paymentMethodId;
        $payment->issuer_id = (int)$request->issuer;

        $payer = new \MercadoPago\Payer();
        $payer->email = $request->email;
        $payer->identification = array(
            "type" => $request->docType,
            "number" => $request->docNumber,
        );
        
        $payment->payer = $payer;
        $payment->save();
        
        // Se der certo o payment vai armazenar os dados de cartão do cliente
        if($payment) {
            // dd($payment); DEU CERTO
            // Select para ver se o solicitante já possui um id de customer
            //Customer é o cliente no mercado pago
            $solicitantesCustomer = $this->objSolicitante
                                ->where('ID_USUARIO', auth()->user()->id)
                                ->select('SOLICITANTES.ID_CUSTOMER')
                                ->get();
                                
            foreach ($solicitantesCustomer as $solicitanteCustomer) {
                $idCustomer = $solicitanteCustomer;
            }
            dd($idCustomer);
            //Verifico se já existe um id de customer, caso não eu crio
            if(isset($idCustomer)){

                $customer = new \MercadoPago\Customer();
                $customer->email = $request->email;
                $customer->save();

                if($customer) {
                    //Card é o cartão do cliente
                    $card = new \MercadoPago\Card();
                    $card->token = $request->token;

                    if($request->paymentMethodId == "master") {
                        $card->issuer = $request->issuer;
                    }

                    $card->customer_id = $customer->id;
                    $card->save();
                    
                    if($card) {
                        // Pegando o valor da constant para colocar no cartão
                        $statusAtivo = \Config::get('constants.STATUS.ATIVO');

                        // Gravando os dados do cartão do nosso lado
                        $cartao = $this->objCartoes->create([
                            'ID_CUSTOMER' => $customer->id,
                            'ID_CARTAO' => $card->id,
                            'INICIO_CARTAO' => $card->first_six_digits,
                            'FIM_CARTAO' => $card->last_four_digits,
                            'MES_VENCIMENTO' => $card->expiration_month,
                            'ANO_VENCIMENTO' => $card->expiration_year,
                            'CVV' => Crypt::encryptString($request->cvv),
                            'BANDEIRA' => $request->paymentMethodId,
                            'STATUS' => $statusAtivo,
                        ]);
                    }

                    if($payment) {
                        //Gravando os dados do pagamento de validação para estorno.
                        $validaCartao = $this->objValidaCartao->create([
                            'ID_PAGAMENTO' => $payment->id,
                            'ID_CARTAO' => $card->id,
                            'STATUS' => $payment->status,
                            'DT_CRIACAO' => $payment->date_created,
                            'DT_APROVACAO' => $payment->date_approved,
                        ]);
                    }
                }
            dd($payment,$customer,$card,$cartao,$validaCartao);
            } else {
                //Caso já exista um customer, eu apenas gravo os dados do cartão.
                $card = new \MercadoPago\Card();
                $card->token = $request->token;

                if($request->paymentMethodId == "master") {
                    $card->issuer = $request->issuer;
                }

                $card->customer_id = $idCustomer;
                $card->save();
                
                if($card) {
                    // Gravando os dados do cartão do nosso lado
                    $cartao = $this->objCartoes->create([
                        'ID_CUSTOMER' => $customer->id,
                        'ID_CARTAO' => $card->id,
                        'INICIO_CARTAO' => $card->first_six_digits,
                        'FIM_CARTAO' => $card->last_four_digits,
                        'MES_VENCIMENTO' => $card->expiration_month,
                        'ANO_VENCIMENTO' => $card->expiration_year,
                        'CVV' => Crypt::encryptString($request->cvv),
                        'BANDEIRA' => $request->paymentMethodId,
                        'STATUS' => $statusAtivo,
                    ]);
                }

                if($payment) {
                    //Gravando os dados do pagamento de validação para estorno.
                    $validaCartao = $this->objValidaCartao->create([
                        'ID_PAGAMENTO' => $payment->id,
                        'ID_CARTAO' => $card->id,
                        'STATUS' => $payment->status,
                        'DT_CRIACAO' => $payment->date_created,
                        'DT_APROVACAO' => $payment->date_approved,
                    ]);
                }
            dd($payment,$idCustomer,$card,$cartao,$validaCartao);
            }
        } else {
            $errorArray = (array)$payment->error;
            echo json_encode ($errorArray);
        }        
    }

    public function estornoPaymentValidation()
    {
        $cartoesEstorno = $this->objValidaCartao->all();

        foreach ($cartoesEstorno as $cartaoEstorno) {
            $payment = \MercadoPago\Payment::find_by_id($cartaoEstorno->ID_PAGAMENTO);
            $payment->status = "cancelled";
            $payment->update();
        }
        dd('Passou');
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
