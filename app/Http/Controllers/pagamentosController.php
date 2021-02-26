<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\solicitantes;
use App\Models\cartoes;
use App\Models\valida_cartao;
use App\Models\servicos_prestados;
use App\Models\pagamentos;
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
            $this->objPagamentos = new pagamentos();    
            $this->objValidaCartao = new valida_cartao();
            $this->objServicosPrestados = new servicos_prestados();              
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

        //Verifica se criou o id do payment para ter certeza que houve sucesso com o pagamento.
        if(!empty($payment->id)) {

            // Pega o id do customer do solicitante para validação.
            $solicitantesCustomer = $this->objSolicitante
                                ->where('ID_USUARIO', auth()->user()->id)
                                ->select('SOLICITANTES.ID_CUSTOMER')
                                ->get();
                                
            foreach ($solicitantesCustomer as $solicitanteCustomer) {
                $customerSolicitante = $solicitanteCustomer;
            }

            //Verifica se já existe um id de customer(cliente).
            if(empty($customerSolicitante->ID_CUSTOMER)){
                $customer = new \MercadoPago\Customer();
                $customer->email = $request->email;
                $customer->save();

                //Verifica se existe o id do customer
                if(!empty($customer->id)) {

                    //Coloca o id do customer no solicitante
                    $solicitante = $this->objSolicitante
                                        ->where('SOLICITANTES.ID_USUARIO', auth()->user()->id)
                                        ->update([
                                            'ID_CUSTOMER' => $customer->id,
                                        ]);
                    
                    $card = new \MercadoPago\Card();
                    $card->token = $request->token;

                    if($request->paymentMethodId == "master") {
                        $card->issuer = $request->issuer;
                    }

                    $card->customer_id = $customer->id;
                    $card->save();

                    //Verifica se existe o id do card
                    if(!empty($card->id)) {
                        // Grava os dados do cartão do nosso lado
                        $cartao = $this->objCartoes->create([
                            'ID_CUSTOMER' => $customer->id,
                            'ID_CARTAO' => $card->id,
                            'INICIO_CARTAO' => $card->first_six_digits,
                            'FIM_CARTAO' => $card->last_four_digits,
                            'MES_VENCIMENTO' => $card->expiration_month,
                            'ANO_VENCIMENTO' => $card->expiration_year,
                            'CVV' => Crypt::encryptString($request->cvv),
                            'BANDEIRA' => $request->paymentMethodId,
                            'STATUS' => \Config::get('constants.STATUS.ATIVO'),
                            'PRINCIPAL' => $request->cartaoPrincipal,
                        ]);

                        //Grava os dados do pagamento de validação para estorno.
                        $validaCartao = $this->objValidaCartao->create([
                            'ID_PAGAMENTO' => $payment->id,
                            'ID_CARTAO' => $card->id,
                            'STATUS' => $payment->status,
                            'DT_CRIACAO' => $payment->date_created,
                            'DT_APROVACAO' => $payment->date_approved,
                        ]);
                    } else {
                        $errorArray = (array)$card->error;
                        echo json_encode ($errorArray);
                    }
                } else {
                    $errorArray = (array)$customer->error;
                    echo json_encode ($errorArray);
                }
            } else {
                //Caso já exista um customer, grava os dados do cartão.
                $card = new \MercadoPago\Card();
                $card->token = $request->token;

                if($request->paymentMethodId == "master") {
                    $card->issuer = $request->issuer;
                }

                $card->customer_id = $idCustomer;
                $card->save();
                
                //Verifica se existe o id do card
                if(!empty($card->id)) {
                    // Grava os dados do cartão do nosso lado
                    $cartao = $this->objCartoes->create([
                        'ID_CUSTOMER' => $customer->id,
                        'ID_CARTAO' => $card->id,
                        'INICIO_CARTAO' => $card->first_six_digits,
                        'FIM_CARTAO' => $card->last_four_digits,
                        'MES_VENCIMENTO' => $card->expiration_month,
                        'ANO_VENCIMENTO' => $card->expiration_year,
                        'CVV' => Crypt::encryptString($request->cvv),
                        'BANDEIRA' => $request->paymentMethodId,
                        'STATUS' => \Config::get('constants.STATUS.ATIVO'),
                    ]);

                    //Grava os dados do pagamento de validação para estorno.
                    $validaCartao = $this->objValidaCartao->create([
                        'ID_PAGAMENTO' => $payment->id,
                        'ID_CARTAO' => $card->id,
                        'STATUS' => $payment->status,
                        'DT_CRIACAO' => $payment->date_created,
                        'DT_APROVACAO' => $payment->date_approved,
                    ]);
                }
            }
        } else {
            $errorArray = (array)$payment->error;
            echo json_encode ($errorArray);
        }     
        
        return redirect('/pagamentos');
    }

    public function estornoPaymentValidation()
    {
        \MercadoPago\SDK::setAccessToken("TEST-3508208613949405-021316-3288de42a43e89f96ce0a4a54a85533c-713881257");

        $cartoesEstorno = $this->objValidaCartao
                            ->where('VALIDA_CARTAO.STATUS', '=', 'approved')
                            ->get();

        foreach ($cartoesEstorno as $cartaoEstorno) {
            $payment = \MercadoPago\Payment::find_by_id($cartaoEstorno->ID_PAGAMENTO);
            $payment->refund();

            if($payment->status == "refunded") {
                $this->objValidaCartao->where(['ID_PAGAMENTO' => $cartaoEstorno->ID_PAGAMENTO])->update([
                    'STATUS' => $payment->status,
                ]);
            }
        }
    }

    public function paymentForm()
    {  
        $servicos = $this->objServicosPrestados
                        ->join('SOLICITANTES', 'SERVICOS_PRESTADOS.ID_SOLICITANTE', '=', 'SOLICITANTES.ID')
                        ->join('CARTOES', 'SOLICITANTES.ID_CUSTOMER', '=', 'CARTOES.ID_CUSTOMER')
                        ->whereNull('SERVICOS_PRESTADOS.STATUS_APROVACAO')
                        ->orWhere('SERVICOS_PRESTADOS.STATUS_APROVACAO', '=', '')
                        ->select('SERVICOS_PRESTADOS.VALOR','SERVICOS_PRESTADOS.ID','CARTOES.ID_CARTAO','CARTOES.CVV','SOLICITANTES.ID_CUSTOMER')
                        ->get();
                  
        return view('pagamentos/pagamentos',compact('servicos'));
    }

    public function payment(Request $request)
    {
        \MercadoPago\SDK::setAccessToken("TEST-3508208613949405-021316-3288de42a43e89f96ce0a4a54a85533c-713881257");

        $payment = new \MercadoPago\Payment();
      
        $payment->transaction_amount = $request->transactionAmount;
        $payment->token = $request->token;
        $payment->installments = 1;
        $payment->payer = array(
              "type" => "customer",
              "id" => $request->customerId
          );
      
        $payment->save();

          // Salva os dados do pagamento e atualiza os status do serviço
        if(!empty($payment->id)) {
            $pagamentos = $this->objPagamentos->create([
                'ID_PAGAMENTO' => $payment->id,
                'ID_SERVICO_PRESTADO' => $request->idServico,
                'ID_CARTAO' => $request->idCartao,
                'STATUS' => $payment->status,
                'DT_CRIACAO' => $payment->date_created,
                'DT_APROVACAO' => $payment->date_approved
            ]);
            
            $this->objServicosPrestados->where(['ID' => $request->idServico])->update([
                'STATUS_APROVACAO' => $payment->status,
                'STATUS_SERVICO' => \Config::get('constants.SERVICOS.APROVADO'),
            ]);
        }
        
        return redirect('/pagamentos');
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
