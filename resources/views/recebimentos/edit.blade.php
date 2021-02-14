@extends('templates.template-admin')
@section('content')
<h1 class="text-center">Edição da conta bancária</h1>
<form name="editConta" id="editConta" method="post" action="{{url("recebimentos/$contaRecebimento->ID")}}">
    @csrf
    @method('PUT') 
    <div class="card-body"> 
        <div class="row margin-top-10">
            <div class="col">
                <label for="banco">Banco</label><br>
                <select name="banco" class="custom-select" required>
                    @foreach($bancos as $banco)
                        <option value="{{$banco->ID}}" {{($contaRecebimento->ID_BANCO == $banco->ID) ? 'selected' : ''}}>{{$banco->BANCO}}</option>
                    @endforeach
                </select>                                         
            </div>
            <div class="col">
                <label for="tipoConta">Tipo conta</label><br>
                <select name="tipo_conta" class="custom-select" required>
                    <option value="1" {{($contaRecebimento->TIPO_CONTA === 1) ? 'selected' : ''}}>Conta corrente</option> 
                    <option value="2" {{($contaRecebimento->TIPO_CONTA === 2) ? 'selected' : ''}}>Conta poupança</option> 
                    <option value="3" {{($contaRecebimento->TIPO_CONTA === 3) ? 'selected' : ''}}>Conta salário</option> 
                </select>                                         
            </div>
        </div>
        <br>
        <div class="row margin-top-10">
            <div class="col">
                <label for="tipoConta">Agência</label><br>
                <input class="form-control"type="text" name="agencia" id="agencia" value="{{$contaRecebimento->AGENCIA}}" required><br> 
            </div>
            <div class="col">
                <label for="tipoConta">Conta</label><br>
                <input class="form-control"type="text" name="conta" id="conta" value="{{$contaRecebimento->CONTA}}" required><br>
            </div>
        </div>
        <div class="row margin-top-10">
            <div class="col">
                <label for="tipoConta">Conta principal?</label><br>
                <input type="radio" name="contaRecebimentoPrincipal" id="contaRecebimentoPrincipal" value="1" {{($contaRecebimento->PRINCIPAL == 1) ? 'checked' : ''}}> Sim<br> 
                <input type="radio" name="contaRecebimentoPrincipal" id="contaRecebimentoPrincipal" value="0" {{($contaRecebimento->PRINCIPAL == 0) ? 'checked' : ''}}> Não<br> 
            </div>
        </div>
        <br>
        <input class="btn btn-success" type="submit" value="Salvar">
    </div>
</form>
@endsection