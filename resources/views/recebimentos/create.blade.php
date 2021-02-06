@extends('templates.template-admin')
@section('content')
<div id="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary padding-top-15">Conta bancária</h6>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-success" data-toggle="modal" data-target="#modalCadastroContaBancaria" href=""> Cadastrar </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Banco</th>
                            <th scope="col">Agência</th>
                            <th scope="col">Conta</th>
                            <th scope="col">Tipo</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contasRecebimento as $contaRecebimento)
                            <tr>
                                <th scope="row">{{$contaRecebimento->BANCO}}</th>
                                <td>{{$contaRecebimento->AGENCIA}}</td>
                                <td>{{$contaRecebimento->CONTA}}</td>
                                <td>
                                    @if($contaRecebimento->TIPO_CONTA === 1)
                                        Conta corrente
                                    @elseif($contaRecebimento->TIPO_CONTA === 2)
                                        Conta poupança
                                    @else
                                        Conta salário
                                    @endif
                                </td>
                                <td><a class="btn btn-primary" data-toggle="modal" data-target="#modalCadastro" href=""> Editar </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary padding-top-15">Recibos</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Solicitante</th>
                            <th scope="col">Data do serviço</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Comprovante</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <th scope="row">Kauan Henrique</th>
                            <td>21/10/2019</td>
                            <td>R$50,00</td>
                            <td><img src="https://img.icons8.com/color/25/000000/pdf.png"/></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal cadastro -->
<div class="modal fade" id="modalCadastroContaBancaria" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastroLabel">Cadastro conta bancária </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="cadastroConta" id="cadastroConta" method="post" action="{{url('recebimentos')}}">
                    @csrf
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="banco" class="text-dark">Banco</label><br> 
                                <select class ="form-control" name="banco" class="banco" required>
                                    <option value=""></option> 
                                    @foreach($bancos as $banco)
                                        <option value="{{$banco->ID}}">{{$banco->BANCO}}</option>
                                    @endforeach
                                </select>                                         
                            </div>
                            <div class="col">
                                <label for="tipoConta" class="text-dark">Tipo conta</label><br>
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
                                <label for="agencia" class="text-dark">Agência</label><br>
                                <input class="form-control"type="text" name="agencia" id="agencia"required><br> 
                            </div>
                            <div class="col">
                                <label for="conta" class="text-dark">Conta</label><br>
                                <input class="form-control"type="text" name="conta" id="conta" required><br>
                            </div>
                        </div>
                        <input class="btn btn-success" type="submit" value="Salvar">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fim modal cadastro -->
@endsection