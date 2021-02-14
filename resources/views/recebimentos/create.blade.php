@extends('templates.template-admin')
@section('content')
<h1 class="text-center">Cadastro de conta bancária</h1>
    <form name="cadastroConta" id="cadastroConta" method="post" action="{{url('recebimentos')}}">
        @csrf
        <div class="card-body"> 
            <div class="row margin-top-10">
                <div class="col">
                    <label for="banco">Banco</label><br>
                    <select name="banco" class="custom-select" required>
                        <option value=""></option> 
                        @foreach($bancos as $banco)
                        <option value="{{$banco->ID}}">{{$banco->BANCO}}</option>
                    @endforeach
                    </select>                                         
                </div>
                <div class="col">
                    <label for="tipoConta">Tipo conta</label><br>
                    <select name="tipo_conta" class="custom-select" required>
                        <option value=""></option> 
                        <option value="1">Conta corrente</option> 
                        <option value="2">Conta poupança</option> 
                        <option value="3">Conta salário</option> 
                    </select>                                         
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="tipoConta">Agência</label><br>
                    <input class="form-control"type="text" name="agencia" id="agencia" required><br> 
                </div>
                <div class="col">
                    <label for="tipoConta">Conta</label><br>
                    <input class="form-control"type="text" name="conta" id="conta" required><br>
                </div>
            </div>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="tipoConta">Conta principal?</label><br>
                    <input type="radio" name="contaRecebimentoPrincipal" id="contaRecebimentoPrincipal" value="1"> Sim<br> 
                    <input type="radio" name="contaRecebimentoPrincipal" id="contaRecebimentoPrincipal" value="0"> Não<br> 
                </div>
            </div>
            <br>
            <input class="btn btn-success" type="submit" value="Salvar">
        </div>
    </form>
@endsection