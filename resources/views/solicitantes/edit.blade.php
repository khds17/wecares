@extends('templates.template-admin')
@section('content')
<h1 class="text-center">Edição dos dados cadastrais</h1>
    <form name="formSolicitanteEdit" id="formSolicitanteEdit" method="post" enctype="multipart/form-data" action="{{url("solicitante/$solicitantes->ID")}}">   
        @csrf
        @method('PUT') 
        <div class="card-body"> 
            <div class="row margin-top-10">
                <div class="col">
                    <label for="nome">Nome completo</label>
                    <input class="form-control" type="text" name="solicitanteNome" id="solicitanteNome" value="{{$solicitantes->NOME}}">
                    @error('solicitanteNome')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="cpf">CPF</label>
                    <input class="form-control" type="solicitanteCPF" name="solicitanteCPF" id="cpf" value="{{$solicitantes->CPF}}"> 
                    @error('solicitanteCPF')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="telefone">Número celular</label>
                    <input class="form-control" type="text" name="solicitanteTelefone" id="solicitanteTelefone" value="{{$solicitantes->TELEFONE}}">
                    @error('solicitanteTelefone')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>    
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="email" name="solicitanteEmail" id="solicitanteEmail" value="{{$solicitantes->EMAIL}}" disabled>
                    @error('solicitanteEmail')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>    
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="senha">Senha</label>
                    <input class="form-control" type="password" name="solicitanteSenha" id="solicitanteSenha" value="{{$users->password}}" disabled>
                    @error('solicitanteSenha')
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
                    <input class="form-control" type="text" name="solicitanteCep" id="solicitanteCep" value="{{$enderecos->CEP}}">
                    @error('solicitanteCep')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="endereco">Endereço</label>
                    <input class="form-control" type="text" name="solicitanteEndereco" id="solicitanteEndereco" value="{{$enderecos->ENDERECO}}">
                    @error('solicitanteEndereco')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="numero">Número</label>
                    <input class="form-control" type="text" name="solicitanteNumero" id="solicitanteNumero" value="{{$enderecos->NUMERO}}">
                    @error('solicitanteNumero')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="cidade">Cidade</label>
                    <select class ="form-control" name="solicitanteCidade" id="solicitanteCidade" value="">
                        <option value="">Cidade</option>
                        @foreach($cidades as $cidade)         
                            <option value="{{$cidade->ID}}" {{($solicitantes->ID_ENDERECO == $enderecos->ID && $cidade->ID == $enderecos->ID_CIDADE) ? 'selected' : ''}}>{{$cidade->CIDADE}}</option>
                        @endforeach
                    </select>   
                    @error('solicitanteCidade')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="bairro">Bairro</label>
                    <input class="form-control" type="text" name="solicitanteBairro" id="solicitanteBairro" value="{{$enderecos->BAIRRO}}">
                    @error('solicitanteBairro')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="estado">Estado</label>
                    <select class ="form-control"name="solicitanteEstado" id="solicitanteEstado" value="">
                        <option value="">Estado</option>
                        @foreach($estados as $estado)
                            <option value="{{$estado->ID}}" {{($solicitantes->ID_ENDERECO == $enderecos->ID && $estado->ID == $enderecos->ID_ESTADO) ? 'selected' : ''}}>{{$estado->UF}}</option>
                        @endforeach
                    </select>   
                    @error('solicitantestado')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror           
                </div>
                <div class="col">
                    <label for="complemento">Complemento</label>
                    <input class="form-control" type="text" name="solicitanteComplemento" id="solicitanteComplemento"  value="{{$enderecos->COMPLEMENTO}}">
                    @error('solicitanteComplemento')
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