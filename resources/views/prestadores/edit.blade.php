@extends('templates.template-admin')
@section('content')
<h1 class="text-center">Edição dos dados cadastrais</h1>
    <form name="formPrestadorEdit" id="formPrestadorEdit" method="post" enctype="multipart/form-data" action="{{url("prestador/$prestadores->ID")}}">   
        @csrf
        @method('PUT') 
        <div class="card-body">
            <div class="row margin-top-10">
                <div class="col">
                    <label for="nome">Nome completo</label>
                    <input class="form-control" type="text" name="prestadorNome" id="prestadorNome" value="{{$prestadores->NOME}}">
                    @error('prestadorNome')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="cpf">CPF</label>
                    <input class="form-control" type="text" name="prestadorCPF" id="prestadorCPF" value="{{$prestadores->CPF}}"> 
                    @error('prestadorCPF')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="telefone">Número celular</label>
                    <input class="form-control" type="text" name="prestadorTelefone" id="prestadorTelefone" value="{{$prestadores->TELEFONE}}">
                    @error('prestadorTelefone')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>    
            <br>
            <div class="row margin-top-10">   
                <div class="font-color-gray col"> 
                    <label for="nascimento">Data de nascimento</label>
                    <input class="form-control" type="date" name="prestadorNascimento" id="prestadorNascimento" value="{{$prestadores->DT_NASCIMENTO}}">
                    @error('prestadorNascimento')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="font-color-gray col">
                    <label for="sexo">Sexo</label> &nbsp;&nbsp; <br>
                    @foreach($sexos as $sexo)
                        <input type="radio" name="sexo" id="sexo" value="{{$sexo->ID}}" {{($sexo->ID == $prestadores->ID_SEXO) ? 'checked' : ''}}> {{$sexo->SEXO}} <br> 
                    @endforeach
                    @error('sexo')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="email" name="prestadorEmail" id="prestadorEmail" value="{{$prestadores->EMAIL}}" disabled>
                    @error('prestadorEmail')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>    
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="senha">Senha</label>
                    <input class="form-control" type="password" name="prestadorSenha" id="prestadorSenha" value="{{$users->password}}" disabled>
                    @error('prestadorSenha')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <br><br>
                    <a href="{{url('/password/reset')}}" target="_blank">Alterar senha</a>
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="cep">CEP</label>
                    <input class="form-control" type="text" name="prestadorCep" id="prestadorCep" value="{{$enderecos->CEP}}">
                    @error('prestadorCep')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="endereco">Endereço</label>
                    <input class="form-control" type="text" name="prestadorEndereco" id="prestadorEndereco" value="{{$enderecos->ENDERECO}}">
                    @error('prestadorEndereco')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="numero">Número</label>
                    <input class="form-control" type="text" name="prestadorNumero" id="prestadorNumero" value="{{$enderecos->NUMERO}}">
                    @error('prestadorNumero')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="cidade">Cidade</label>
                    <select class ="form-control" name="prestadorCidade" id="prestadorCidade" value="">
                        @foreach($cidades as $cidade)         
                            <option value="{{$cidade->ID}}" {{($prestadores->ID_ENDERECO == $enderecos->ID && $cidade->ID == $enderecos->ID_CIDADE) ? 'selected' : ''}}>{{$cidade->CIDADE}}</option>
                        @endforeach
                    </select>   
                    @error('prestadorCidade')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="bairro">Bairro</label>
                    <input class="form-control" type="text" name="prestadorBairro" id="prestadorBairro" value="{{$enderecos->BAIRRO}}">
                    @error('prestadorBairro')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="estado">Estado</label>
                    <select class ="form-control"name="prestadorEstado" id="prestadorEstado" value="">
                        @foreach($estados as $estado)
                            <option value="{{$estado->ID}}" {{($prestadores->ID_ENDERECO == $enderecos->ID && $estado->ID == $enderecos->ID_ESTADO) ? 'selected' : ''}}>{{$estado->UF}}</option>
                        @endforeach
                    </select>   
                    @error('prestadorEstado')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror           
                </div>
                <div class="col">
                    <label for="complemento">Complemento</label>
                    <input class="form-control" type="text" name="prestadorComplemento" id="prestadorComplemento" value="{{$enderecos->COMPLEMENTO}}">
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
                        <input type="radio" name="formacao" id="formacao" value="{{$formacao->ID}}" {{($formacao->ID === $prestadores->ID_FORMACAO) ? 'checked' : ''}}> {{$formacao->FORMACAO}} <br> 
                    @endforeach
                    @error('formacao')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col font-color-gray">
                    <label for="certificado">Certificado</label>
                    @foreach ($certificados as $certificado)
                    @if ($certificado->CERTIFICADO)
                        <a href="{{url("storage/{$certificado->CERTIFICADO}")}}" target="_blank">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-medical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 1h5v1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6h1v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2z"/>
                                <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 0 1 9 4.5z"/>
                                <path fill-rule="evenodd" d="M7 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L8 6l.549.317a.5.5 0 1 1-.5.866L7.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L6 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 7 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </a>
                    @endif
                    @endforeach
                    <br>
                    <input type="file" name="certificadoFormacao" id="certificadoFormacao" value="">
                    @error('certificadoFormacao')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col font-color-gray">
                    <label for="antecedentes">Antecedentes criminais</label>
                    @foreach ($antecedentes as $antecedente)
                        @if ($antecedente->ANTECEDENTE)
                            <a href="{{url("storage/{$antecedente->ANTECEDENTE}")}}" target="_blank">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-medical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 1h5v1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6h1v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2z"/>
                                    <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 0 1 9 4.5z"/>
                                    <path fill-rule="evenodd" d="M7 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L8 6l.549.317a.5.5 0 1 1-.5.866L7.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L6 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 7 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </a>
                        @endif
                    @endforeach
                    <br>
                    <input type="file" name="antecedentes" id="antecedentes" value=""><br>
                    @error('antecedentes')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <input class="btn btn-primary" type="submit" value="Salvar">
        </div>
    </form>
    {{-- Fim do formulario --}}
@endsection