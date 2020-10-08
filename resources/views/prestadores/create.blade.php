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
                                    <input class="form-control" type="text" name="prestadorNome" id="prestadorNome" placeholder="Nome completo" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="prestadorCPF" name="prestadorCPF" id="cpf" placeholder="CPF" required> 
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorNumero" id="prestadorNumero" placeholder="Número do celular" required ><br>
                                </div>
                            </div>    
                            <div class="row margin-top-10">   
                                <div class="font-color-gray col"> 
                                    <label for="sexo">Data de nascimento:</label>
                                    <input class="form-control" type="date" name="prestadorNascimento" id="prestadorNascimento" placeholder="Data de nascimento" required ><br>
                                </div>
                                <div class="font-color-gray col">
                                    <label for="sexo">Sexo:</label> &nbsp;&nbsp; <br>
                                    <input type="radio" name="sexo" id="feminino"> Feminino &nbsp;<br>
                                    <input type="radio" name="sexo" id="masculino"> Masculino &nbsp;
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="email" name="prestadorEmail" id="prestadorEmail" placeholder="E-mail" required><br>
                                </div>
                            </div>    
                            <div class="row margin-top-10">
                                <div class="col">
                                <input class="form-control" type="password" name="prestadorSenha" id="prestadorSenha" placeholder="Senha" required>
                                </div>
                                <div class="col">
                                <input class="form-control" type="password" name="prestadorConfirmarSenha" id="prestadorConfirmarSenha" placeholder="Confirme a senha" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorCep" id="prestadorCep" placeholder="CEP" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorEndereco" id="prestadorEndereco" placeholder="Endereço" required>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorNumero" id="prestadorNumero" placeholder="Número" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <select class ="form-control"name="prestadorCidade" id="prestadorCidade">
                                        <option value="">Cidade</option>
                                        @foreach($cidades as $cidade)
                                            <option value="">{{$cidade->CIDADE}}</option>
                                        @endforeach
                                    </select>   
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorBairro" id="prestadorBairro" placeholder="Bairro" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <select class ="form-control"name="prestadorEstado" id="prestadorEstado">
                                        <option value="">Estado</option>
                                        @foreach($estados as $estado)
                                            <option value="{{$estado->ESTADO}}">{{$estado->UF}}</option>
                                        @endforeach
                                    </select>              
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorComplemento" id="prestadorComplemento" placeholder="Complemento" required>
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label for="formacao">Formação</label><br>
                                    <input type="radio" name="formacao" id="formacao"> Cuidadora <br> 
                                    <input type="radio" name="formacao" id="formacao"> Enfermeira
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
                                    <input type="file" name="antecedentes" id="antecedentes" required>
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <input type="checkbox" name="termos" id="termos" required>
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