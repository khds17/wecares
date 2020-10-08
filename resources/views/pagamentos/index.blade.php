@extends('templates.template-admin')
@section('content')
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
                            <th scope="col">Cartão de crédito</th>
                            <th scope="col">Bandeira</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>5343293366872006</td>
                            <td> Master Card <img src="https://img.icons8.com/color/30/000000/mastercard.png"/></td>
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
                            <th scope="col">Prestador</th>
                            <th scope="col">Data do pagamento</th>
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
                <form name="cadastroCartao" id="cadastroCartao" method="post" action="">
                    <div class="row margin-top-10">
                        <div class="col">
                            <input class="form-control"type="text" name="numeroCartao" id="numeroCartao" placeholder="Número do seu cartão" required"><br> 
                        </div>
                        <div class="col">
                            <input class="form-control"type="text" name="cvv" id="cvv" placeholder="Código verificador (CVV) " required"><br> 
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col">
                            <label for="banco" class="text-dark">Mes de validade</label><br>
                            <select name="select" class="custom-select" required>
                                <option value="janeiro">Janeiro</option> 
                                <option value="fevereiro">Fevereiro</option> 
                                <option value="marco">Março</option> 
                                <option value="abril">Abril</option> 
                                <option value="maio">Maio</option> 
                                <option value="junho">Junho</option> 
                                <option value="julho">Julho</option> 
                                <option value="agosto">Agosto</option> 
                                <option value="setembro">Setembro</option> 
                                <option value="outubro">Outubro</option> 
                                <option value="novembro">Novembro</option> 
                                <option value="dezembro">Dezembro</option> 
                            </select>                                         
                        </div>
                        <div class="col">
                            <label for="tipoConta" class="text-dark">Ano de validade</label><br>
                            <select name="select" class="custom-select" required>
                                <option value="valor1">2022</option> 
                                <option value="valor2">2023</option> 
                                <option value="valor3">2024</option> 
                                <option value="valor4">2025</option> 
                                <option value="valor5">2026</option> 
                                <option value="valor6">2027</option> 
                                <option value="valor7">2028</option> 
                                <option value="valor8">2029</option> 
                                <option value="valor9">2030</option> 
                            </select>                                         
                        </div>
                    </div>
                    <br>
                    <input class="btn btn-success" type="submit" value="Salvar">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@endsection