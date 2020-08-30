@extends('templates.template')
@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h1 class="text-center padding-top-50">Seja um cuidador</h1>
                    <div class="card-body">
                        <form name="formPrestador" id="formPrestador" method="post" action="{{url('prestador')}}">   
                            @csrf
                            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome:"><br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="cpf" name="cpf" id="cpf" placeholder="CPF:"> 
                                </div>
                                <div class="col">
                                <input class="form-control" type="date" name="nascimento" id="nascimento" placeholder="Data de nascimento:"><br>
                                </div>
                            </div>       
                            <div class="font-color-gray"> 
                                <label for="sexo">Sexo:</label> &nbsp;&nbsp;  
                                <input type="radio" name="feminino" id="feminino"> Feminino &nbsp;
                                <input type="radio" name="masculino" id="masculino"> Masculino &nbsp;
                                <input type="radio" name="outrosexo" id="outrosexo"> Outro
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="email" name="email" id="email" placeholder="E-mail:"><br>
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
                                    <input class="form-control" type="text" name="cep" id="cep" placeholder="CEP:"><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="endereco" id="endereco" placeholder="Endereço:">
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="numero" id="numero" placeholder="Número:"><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="cidade" id="cidade" placeholder="Cidade:">
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="bairro" id="bairro" placeholder="Bairro:" ><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="complemento" id="complemento" placeholder="Complemento:">
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="estado" id="estado" placeholder="UF:"><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label for="formacao">Formação</label><br>
                                    <input type="radio" name="formacao" id="feminino"> Cuidadora <br> 
                                    <input type="radio" name="formacao" id="masculino"> Enfermeira
                            </div>
                                <div class="col font-color-gray">
                                    <label for="certificado">Certificado</label>
                                    <input type="file" name="certificadoFormacao" id="certificadoFormacao">
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label for="antecedentes">Antecedentes criminais</label><br>
                                    <input type="file" name="certificadoFormacao" id="certificadoFormacao">
                            </div>
                            </div>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Cadastrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection