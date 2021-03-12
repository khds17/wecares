@extends('templates.template-admin')
@section('content')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>
<div id="content">
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary padding-top-15">Forma de pagamento</h6>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-success" data-toggle="modal" data-target="#modalCadastro" href=""> Cadastrar </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col"><center>Cartão de crédito</center></th>
                            <th scope="col"><center>Bandeira</center></th>
                            <th scope="col">Favorito?</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solicitantes as $solicitante)
                        <tr>
                            @if($solicitante->ID_CUSTOMER) {
                                <td>
                                    <center>{{$solicitante->INICIO_CARTAO}}******{{$solicitante->FIM_CARTAO}}</center>
                                </td>
                                @if($solicitante->BANDEIRA == "master")
                                    <td>
                                        <center> <img src="https://img.icons8.com/color/40/000000/mastercard.png"/> </center>
                                    </td>
                                @elseif($solicitante->BANDEIRA == "visa")
                                    <td>
                                        <center> <img src="https://img.icons8.com/color/40/000000/visa.png"/> </center>
                                    </td>
                                @elseif($solicitante->BANDEIRA == "amex")
                                    <td>
                                    <center> <img src="https://img.icons8.com/color/40/000000/amex.png"/> </center>
                                    </td>
                                @elseif($solicitante->BANDEIRA == "discover")
                                    <td>
                                        <center> <img src="https://img.icons8.com/color/40/000000/discover.png"/> </center>
                                    </td>
                                @elseif($solicitante->BANDEIRA == "maestro")
                                    <td>
                                    <center> <img src="https://img.icons8.com/color/40/000000/maestro.png"/> </center>
                                    </td>
                                @else
                                    <td> {
                                    <center> {$solicitante->BANDEIRA}} <img src="https://img.icons8.com/color/40/000000/bank-card-back-side.png"/> </center>
                                    </td>
                                @endif
                                @if ($solicitante->PRINCIPAL === 1)
                                    <td>
                                        <center> <img src="https://img.icons8.com/fluent/25/000000/star.png"/> </center>
                                    </td>
                                @else
                                    <td></td>
                                @endif
                                <td>
                                    <a class="btn btn-primary" href=""> Editar </a>
                                    <a class="btn btn-danger" href=""> Desativar </a>
                                </td>
                            } @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro cartão de crédito </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('processPaymentValidation')}}" method="post" id="paymentForm">
                    @csrf
                    {{-- <h3>Detalhe do comprador</h3> --}}
                    @foreach ($solicitantes as $solicitante)
                      <div class="row margin-top-10">
                        <div class="col">
                          {{-- <label for="email">E-mail</label> --}}
                          <input id="email" name="email" type="hidden" value="{{$solicitante->EMAIL}}"/>
                        </div>
                        <div class="col">
                          {{-- <label for="docType">Tipo de documento</label> --}}
                          <input id="docType" name="docType" data-checkout="docType" type="hidden" value="CPF"></>
                        </div>
                        <div class="col">
                          {{-- <label for="docNumber">Número do documento</label> --}}
                          <input id="docNumber" name="docNumber" data-checkout="docNumber" type="hidden" value="{{$solicitante->CPF}}"/>
                        </div>
                      </div>
                    @endforeach
                    {{-- <h3>Detalhes do cartão</h3> --}}
                      <div class="row margin-top-10 info-cartao-prestador">
                        <div class="col">
                          <label for="cardholderName">Nome no cartão</label>
                          <input class="form-control" id="cardholderName" data-checkout="cardholderName" type="text">
                        </div>
                        <div class="col">
                            <label for="cardNumber">Número do cartão</label>
                            <input class="form-control" type="text" id="cardNumber" data-checkout="cardNumber"
                              onselectstart="return false" onpaste="return false"
                              oncopy="return false" oncut="return false"
                              ondrag="return false" ondrop="return false" autocomplete=off>
                          </div>
                      </div>
                        <div class="row margin-top-10">
                            <div class="col">
                            <label for="">Data de vencimento</label>
                                <div class ="vencimentoCampoInput">
                                    <input class="form-control " type="text" placeholder="MM" id="cardExpirationMonth" data-checkout="cardExpirationMonth"
                                    onselectstart="return false" onpaste="return false"
                                    oncopy="return false" oncut="return false"
                                    ondrag="return false" ondrop="return false" autocomplete=off>
                                    <span class="date-separator"> / </span>
                                    <input class="form-control" type="text" placeholder="YY" id="cardExpirationYear" data-checkout="cardExpirationYear"
                                    onselectstart="return false" onpaste="return false"
                                    oncopy="return false" oncut="return false"
                                    ondrag="return false" ondrop="return false" autocomplete=off>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="securityCode">Código de segurança</label>
                                <input class="form-control" id="securityCode" data-checkout="securityCode" type="text"
                                    onselectstart="return false" onpaste="return false"
                                    oncopy="return false" oncut="return false"
                                    ondrag="return false" ondrop="return false" autocomplete=off onchange="catchCVV()">
                            </div>
                            <div class="col" id="issuerInput">
                                <label for="issuer">Banco emissor</label>
                                <br>
                                <select class="form-control" id="issuer" name="issuer" data-checkout="issuer"></select>
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col d-none">
                                <label for="installments">Parcelas</label>
                                <select type="text" id="installments" name="installments"></select>
                            </div>
                            <div class="col">
                                <input type="hidden" name="transactionAmount" id="transactionAmount" value="1" />
                                <input type="hidden" name="cvv" id="cvv"/>
                                <input type="hidden" name="paymentMethodId" id="paymentMethodId" />
                                <input type="hidden" name="description" id="description" />
                            </div>
                        </div>
                        <br>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="tipoConta">Favoritar cartão?</label><br>
                                <input type="radio" name="cartaoPrincipal" id="cartaoPrincipal" value="1"> Sim<br> 
                                <input type="radio" name="cartaoPrincipal" id="cartaoPrincipal" value="0"> Não<br> 
                            </div>
                        </div>
                        <br>
                        <input class="btn btn-primary" type="submit" value="Salvar">
                  </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@endsection