@extends('templates.template-admin')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary padding-top-15">Dados cadastrais</h6>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo" href=""> Editar </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Idade</th>
                            <th scope="col">Telefone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">Kauan</th>
                        <td>khds2013@gmail.com</td>
                        <td>19995583696</td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados cadastrais </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="user">
                <div class="row margin-top-10">
                    <div class="col">
                        <input class="form-control"type="text" name="nome" id="nome" placeholder="Nome:"><br>
                    </div>
                </div>
                <div class="row margin-top-10">
                    <div class="col">
                        <input class="form-control"type="email" name="email" id="email" placeholder="E-mail:"><br>
                    </div>
                </div>
                <div class="row margin-top-10">
                        <div class="col">
                            <input class="form-control" type="password" name="senha" id="senha" placeholder="Senha">
                        </div>
                        <div class="col">
                            <input class="form-control" type="password" name="confirmarsenha" id="confirmarsenha" placeholder="Confirme a senha"><br>
                        </div>
                </div>
                <div class="row margin-top-10">
                        <div class="col">
                            <input class="form-control" type="text" name="cep" id="cep" placeholder="CEP"><br>
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col">
                            <input class="form-control" type="text" name="endereco" id="endereco" placeholder="Endereço">
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" name="numero" id="numero" placeholder="Número"><br>
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col">
                            <input class="form-control" type="text" name="cidade" id="cidade" placeholder="Cidade">
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" name="bairro" id="bairro" placeholder="Bairro" ><br>
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col">
                            <input class="form-control" type="text" name="complemento" id="complemento" placeholder="Complemento">
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" name="estado" id="estado" placeholder="UF"><br>
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col">
                            <input class="form-control"type="text" name="nivelfamiliaridade" id="nivelfamiliaridade" placeholder="Nivel familiaridade:">
                        </div>
                        <div class="col">
                            <input class="form-control"type="text" name="nivelfamiliaridadeoutros" id="nivelfamiliaridadeoutros" placeholder="Nivel familiaridade outros:">
                        </div>
                    </div>
                    <br>
                    <div class="row margin-top-10">
                        <div class="col font-color-gray">
                            <input class="btn btn-primary" type="submit" value="Salvar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection