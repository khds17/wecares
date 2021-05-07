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
                    <input class="form-control" type="text" name="solicitanteCep" id="solicitanteCep" @if($enderecos) value= "{{$enderecos->CEP}}" @else value= "" @endif>
                    @error('solicitanteCep')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="endereco">Endereço</label>
                    <input class="form-control" type="text" name="solicitanteEndereco" id="solicitanteEndereco" @if($enderecos) value= "{{$enderecos->ENDERECO}}" @else value= "" @endif>
                    @error('solicitanteEndereco')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="numero">Número</label>
                    <input class="form-control" type="text" name="solicitanteNumero" id="solicitanteNumero" @if($enderecos) value= "{{$enderecos->NUMERO}}" @else value= "" @endif>
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
                        <option value=""></option>
                        @foreach($cidades as $cidade)
                            <option value="{{$cidade->ID}}" @if($solicitantes->ID_ENDERECO) {{($solicitantes->ID_ENDERECO == $enderecos->ID && $cidade->ID == $enderecos->ID_CIDADE) ? 'selected' : ''}} @else value="" @endif>{{$cidade->CIDADE}}</option>
                        @endforeach
                    </select>
                    @error('solicitanteCidade')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="bairro">Bairro</label>
                    <input class="form-control" type="text" name="solicitanteBairro" id="solicitanteBairro" @if($enderecos) value= "{{$enderecos->BAIRRO}}" @else value= "" @endif>
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
                        <option value=""></option>
                        @foreach($estados as $estado)
                            <option value="{{$estado->ID}}" @if($solicitantes->ID_ENDERECO) {{($solicitantes->ID_ENDERECO == $enderecos->ID && $cidade->ID == $enderecos->ID_ESTADO) ? 'selected' : ''}} @else value="" @endif>{{$estado->UF}}</option>
                        @endforeach
                    </select>
                    @error('solicitantestado')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="complemento">Complemento</label>
                    <input class="form-control" type="text" name="solicitanteComplemento" id="solicitanteComplemento"  @if($enderecos) value= "{{$enderecos->COMPLEMENTO}}" @else value= "" @endif>
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