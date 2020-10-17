@extends('templates.template')
@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h1 class="text-center padding-top-50">Preencha os campos abaixo para se tornar um cuidador</h1>
                    <div class="card-body">
                        {{-- Inicio do formulario --}}
                        <form name="formPrestador" id="formPrestador" method="post" enctype="multipart/form-data" action="{{url('prestador')}}">   
                            @csrf
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorNome" id="prestadorNome" placeholder="Nome completo" >
                                    @error('prestadorNome')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="prestadorCPF" name="prestadorCPF" id="cpf" placeholder="CPF" > 
                                    @error('prestadorCPF')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorTelefone" id="prestadorTelefone" placeholder="Número do celular">
                                    @error('prestadorTelefone')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>    
                            <br>
                            <div class="row margin-top-10">   
                                <div class="font-color-gray col"> 
                                    <label for="sexo">Data de nascimento:</label>
                                    <input class="form-control" type="date" name="prestadorNascimento" id="prestadorNascimento" placeholder="Data de nascimento">
                                    @error('prestadorNascimento')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="font-color-gray col">
                                    <label for="sexo">Sexo:</label> &nbsp;&nbsp; <br>
                                    <input type="radio" name="sexo" id="feminino" value="feminino"> Feminino &nbsp;<br>
                                    <input type="radio" name="sexo" id="masculino" value="masculino"> Masculino &nbsp;<br>
                                    @error('sexo')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="email" name="prestadorEmail" id="prestadorEmail" placeholder="E-mail">
                                    @error('prestadorEmail')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>    
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="password" name="prestadorSenha" id="prestadorSenha" placeholder="Senha">
                                    @error('prestadorSenha')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="password" name="prestadorConfirmarSenha" id="prestadorConfirmarSenha" placeholder="Confirme a senha">
                                    @error('prestadorConfirmarSenha')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorCep" id="prestadorCep" placeholder="CEP">
                                    @error('prestadorCep')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorEndereco" id="prestadorEndereco" placeholder="Endereço">
                                    @error('prestadorEndereco')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorNumero" id="prestadorNumero" placeholder="Número">
                                    @error('prestadorNumero')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <select class ="form-control"name="prestadorCidade" id="prestadorCidade" >
                                        <option value="">Cidade</option>
                                        @foreach($cidades as $cidade)
                                            <option value="{{$cidade->ID}}">{{$cidade->CIDADE}}</option>
                                        @endforeach
                                    </select>   
                                    @error('prestadorCidade')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorBairro" id="prestadorBairro" placeholder="Bairro">
                                    @error('prestadorBairro')
                                    <span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <select class ="form-control"name="prestadorEstado" id="prestadorEstado" >
                                        <option value="">Estado</option>
                                        @foreach($estados as $estado)
                                            <option value="{{$estado->ID}}">{{$estado->UF}}</option>
                                        @endforeach
                                    </select>   
                                    @error('prestadorEstado')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror           
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorComplemento" id="prestadorComplemento" placeholder="Complemento">
                                    @error('prestadorComplemento')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label for="formacao">Formação</label><br>
                                    <input type="radio" name="formacao" id="formacao" value="cuidador"> Cuidador <br> 
                                    <input type="radio" name="formacao" id="formacao" value="enfermagem"> Enfermagem <br>
                                    @error('formacao')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col font-color-gray">
                                    <label for="certificado">Certificado</label>
                                    <input type="file" name="certificadoFormacao" id="certificadoFormacao">
                                    @error('certificadoFormacao')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label for="antecedentes">Antecedentes criminais</label><br>
                                    <input type="file" name="antecedentes" id="antecedentes"><br>
                                    @error('antecedentes')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <input type="checkbox" name="termos" id="termos" value="aceito" >
                                    <a href="{{url("/termos")}}" target="_blank">Termos </a><label>e</label><a href="{{url("/conduta")}}" target="_blank"> Código de conduta</a><br>
                                    @error('termos')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Cadastrar">
                        </form>
                        {{-- Fim do formulario --}}
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