@extends('templates.template')
@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h1 class="text-center padding-top-50">Preencha os campos abaixo para se tornar um cuidador</h1>
                    <div class="card-body">
                        <form name="formPrestador" id="formPrestador" method="post" action="{{url('prestador')}}">   
                            @csrf
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome completo" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="cpf" name="cpf" id="cpf" placeholder="CPF" required> 
                                </div>
                                <div class="col">
                                <input class="form-control" type="date" name="nascimento" id="nascimento" placeholder="Data de nascimento" required ><br>
                                </div>
                            </div>       
                            <div class="font-color-gray"> 
                                <label for="sexo">Sexo:</label> &nbsp;&nbsp;  
                                <input type="radio" name="sexo" id="feminino"> Feminino &nbsp;
                                <input type="radio" name="sexo" id="masculino"> Masculino &nbsp;
                                <input type="radio" name="sexo" id="outrosexo"> Outro
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="email" name="email" id="email" placeholder="E-mail" required><br>
                                </div>
                            </div>    
                            <div class="row margin-top-10">
                                <div class="col">
                                <input class="form-control" type="password" name="senha" id="senha" placeholder="Senha" required>
                                </div>
                                <div class="col">
                                <input class="form-control" type="password" name="confirmarsenha" id="confirmarsenha" placeholder="Confirme a senha" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="cep" id="cep" placeholder="CEP" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="endereco" id="endereco" placeholder="Endereço" required>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="numero" id="numero" placeholder="Número" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="cidade" id="cidade" placeholder="Cidade" required>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="bairro" id="bairro" placeholder="Bairro" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="complemento" id="complemento" placeholder="Complemento" required>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="estado" id="estado" placeholder="UF" required><br>
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
                                    <input type="file" name="certificadoFormacao" id="certificadoFormacao" required>
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label for="antecedentes">Antecedentes criminais</label><br>
                                    <input type="file" name="certificadoFormacao" id="certificadoFormacao" required>
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <input type="checkbox" name="" id="">
                                    <a href="{{url("/termos")}}" target="_blank">Termos </a><label>e</label><a href="{{url("/conduta")}}" target="_blank"> Código de conduta</a>
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
    <div class="svg-border-rounded text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
    </div>
</header>
@endsection