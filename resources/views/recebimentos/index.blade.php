@extends('templates.template-admin')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary padding-top-15">Conta bancária</h6>
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
                            <th scope="col">Banco</th>
                            <th scope="col">Agência</th>
                            <th scope="col">Conta</th>
                            <th scope="col">Tipo</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Inter</th>
                            <td>0001</td>
                            <td>1234568</td>
                            <td>Conta corrente</td>
                            <td><a class="btn btn-primary" data-toggle="modal" data-target="#modalCadastro" href=""> Editar </a></td>
                        </tr>
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
<div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastroLabel">Cadastro conta bancária </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="cadastroConta" id="cadastroConta" method="post" action="">
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="banco" class="text-dark">Banco</label><br>
                                <select name="select" class="custom-select" required>
                                    <option value="valor1">Inter</option> 
                                </select>                                         
                            </div>
                            <div class="col">
                                <label for="tipoConta" class="text-dark">Tipo conta</label><br>
                                <select name="select" class="custom-select" required>
                                    <option value="valor1">Conta corrente</option> 
                                </select>                                         
                            </div>
                        </div>
                        <br>
                        <div class="row margin-top-10">
                            <div class="col">
                                <input class="form-control"type="text" name="agencia" id="agencia" placeholder="Digite sua agência" required"><br> 
                            </div>
                            <div class="col">
                                <input class="form-control"type="text" name="conta" id="conta" placeholder="Digite sua conta" required"><br>
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