@extends('templates.template-admin')
@section('content')
<div class="card-body">
  @foreach ($servicos as $servico)
    <form action="{{url('/payment')}}" method="post" id="pay">
      @csrf
      {{-- <h3>Detalhes do cartão</h3> --}}
        <div class="row margin-top-10">
          <div class="col">
              <label for="cardNumber">ID cartão</label>
          <input class="form-control" type="text" id="cardId" data-checkout="cardId" value="{{$servico->ID_CARTAO}}"
                onselectstart="return false" onpaste="return false"
                oncopy="return false" oncut="return false"
                ondrag="return false" ondrop="return false" autocomplete=off>
            </div>
            <div class="col">
              <label for="servicoValor">Valor serviço</label>
              <input class="form-control" type="text" name="transactionAmount" id="transactionAmount" value="{{$servico->VALOR}}" />
            </div>
        </div>
        <br>
        <div class="row margin-top-10">
          <div class="col">
            <label for="securityCode">Código de segurança</label>
            <input class="form-control" id="securityCode" data-checkout="securityCode" type="text" value="{{Crypt::decryptString($servico->CVV)}}" onclick="testemercadopago()"
              onselectstart="return false" onpaste="return false"
              oncopy="return false" oncut="return false"
              ondrag="return false" ondrop="return false" autocomplete=off>
          </div>
          <div class="col">
            <label for="securityCode">ID Customer</label>
            <input class="form-control" name="customerId" id="customerId" type="text" value="{{$servico->ID_CUSTOMER}}">
          </div>
      </div>
      <br>
      <input class="btn btn-primary" type="submit" value="Pagar">
    </form>
    <br>
  @endforeach
</div>
@endsection