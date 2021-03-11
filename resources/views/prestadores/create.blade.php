@extends('templates.template')
@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h1 class="text-center padding-top-50">Cadastra-se como cuidador</h1>
                    <div class="card-body">
                        {{-- Inicio do formulario --}}
                        <form name="formPrestador" id="formPrestador" method="post" enctype="multipart/form-data" action="{{url('prestador')}}">   
                            @csrf
                            <div class="row margin-top-10">
                                <div class="col">
                                <input class="form-control" type="text" name="prestadorNome" id="prestadorNome" placeholder="Nome completo" value="{{old('prestadorNome')}}">
                                    @error('prestadorNome')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="prestadorCPF" name="prestadorCPF" id="cpf" placeholder="CPF" value="{{old('prestadorCPF')}}"> 
                                    @error('prestadorCPF')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorTelefone" id="prestadorTelefone" placeholder="Número do celular" value="{{old('prestadorTelefone')}}">
                                    @error('prestadorTelefone')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>    
                            <br>
                            <div class="row margin-top-10">   
                                <div class="col"> 
                                    <label for="nascimento" class="text-dark">Data de nascimento:</label>
                                    <input class="form-control" type="date" name="prestadorNascimento" id="prestadorNascimento" placeholder="Data de nascimento" value="{{old('prestadorNascimento')}}">
                                    @error('prestadorNascimento')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="font-color-gray col">
                                    <label for="sexo">Sexo</label> &nbsp;&nbsp; <br>
                                    @foreach($sexos as $sexo)
                                        <input type="radio" name="sexo" id="sexo" value="{{$sexo->ID}}"> {{$sexo->SEXO}} <br> 
                                    @endforeach
                                    @error('sexo')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="email" name="prestadorEmail" id="prestadorEmail" placeholder="E-mail" value="{{old('prestadorEmail')}}">
                                    @error('prestadorEmail')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>    
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="password" name="prestadorSenha" id="prestadorSenha" placeholder="Senha" value="{{old('prestadorSenha')}}">
                                    @error('prestadorSenha')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="password" name="prestadorConfirmarSenha" id="prestadorConfirmarSenha" placeholder="Confirme a senha" value="{{old('prestadorConfirmarSenha')}}">
                                    @error('prestadorConfirmarSenha')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorCep" id="prestadorCep" placeholder="CEP" value="{{old('prestadorCep')}}">
                                    @error('prestadorCep')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorEndereco" id="prestadorEndereco" placeholder="Endereço" value="{{old('prestadorEndereco')}}">
                                    @error('prestadorEndereco')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="prestadorNumero" id="prestadorNumero" placeholder="Número" value="{{old('prestadorNumero')}}">
                                    @error('prestadorNumero')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <select class ="form-control" name="prestadorCidade" id="prestadorCidade" value="{{old('prestadorCidade')}}">
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
                                    <input class="form-control" type="text" name="prestadorBairro" id="prestadorBairro" placeholder="Bairro" value="{{old('prestadorBairro')}}">
                                    @error('prestadorBairro')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <select class ="form-control"name="prestadorEstado" id="prestadorEstado" value="{{old('prestadorEstado')}}">
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
                                    <input class="form-control" type="text" name="prestadorComplemento" id="prestadorComplemento" placeholder="Complemento" value="{{old('prestadorComplemento')}}">
                                    @error('prestadorComplemento')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label for="formacao">Formação</label><br>
                                    @foreach($formacoes as $formacao)
                                        <input type="radio" name="formacao" id="formacao" value="{{$formacao->ID}}"> {{$formacao->FORMACAO}} <br> 
                                    @endforeach
                                    @error('formacao')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col font-color-gray">
                                    <label for="certificado">Certificado</label>
                                    <input type="file" name="certificadoFormacao" id="certificadoFormacao" value="{{old('certificadoFormacao')}}">
                                    @error('certificadoFormacao')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label for="antecedentes">Antecedentes criminais</label><br>
                                    <input type="file" name="antecedentes" id="antecedentes" value="{{old('antecedentes')}}"><br>
                                    @error('antecedentes')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col font-color-gray">
                                    <label for="foto">Foto de perfil</label><br>
                                    <input type="file" name="foto" id="foto" value="{{old('perfil')}}"><br>
                                    @error('foto')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <input type="checkbox" name="termos" id="termos" value="aceito">
                                    <a href="{{url("/termos")}}" target="_blank">Termos de uso </a><label>e</label><a href="{{url("/privacidade")}}" target="_blank"> privacidade</a><br>
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