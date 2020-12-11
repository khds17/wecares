@extends('templates.template-admin')
@section('content')
    {{-- Inicio do formulario --}}
    <form name="formSolicitanteEdit" id="formSolicitanteEdit" method="post" enctype="multipart/form-data" action="{{url("solicitante/$solicitantes->ID")}}">   
        @csrf
        @method('PUT') 
        <div class="card-body"> 
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">Nome:</label>
                    <input class="form-control" type="text" name="solicitanteNome" id="solicitanteNome" placeholder="Nome completo" value="{{$solicitantes->NOME}}">
                    @error('solicitanteNome')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">CPF:</label>
                    <input class="form-control" type="solicitanteCPF" name="solicitanteCPF" id="cpf" placeholder="CPF" value="{{$solicitantes->CPF}}"> 
                    @error('solicitanteCPF')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="">Número celular</label>
                    <input class="form-control" type="text" name="solicitanteTelefone" id="solicitanteTelefone" placeholder="Número do celular" value="{{$solicitantes->TELEFONE}}">
                    @error('solicitanteTelefone')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>    
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">E-mail:</label>
                    <input class="form-control" type="email" name="solicitanteEmail" id="solicitanteEmail" placeholder="E-mail" value="{{$solicitantes->EMAIL}}" disabled>
                    @error('solicitanteEmail')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>    
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">Senha:</label>
                    <input class="form-control" type="password" name="solicitanteSenha" id="solicitanteSenha" placeholder="Senha" value="{{$users->password}}" disabled>
                    @error('solicitanteSenha')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <br><br>
                    <a href="">Alterar senha</a>
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">CEP:</label>
                    <input class="form-control" type="text" name="solicitanteCep" id="solicitanteCep" placeholder="CEP" value="{{$enderecos->CEP}}">
                    @error('solicitanteCep')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">Endereço:</label>
                    <input class="form-control" type="text" name="solicitanteEndereco" id="solicitanteEndereco" placeholder="Endereço" value="{{$enderecos->ENDERECO}}">
                    @error('solicitanteEndereco')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="">Número:</label>
                    <input class="form-control" type="text" name="solicitanteNumero" id="solicitanteNumero" placeholder="Número" value="{{$enderecos->NUMERO}}">
                    @error('solicitanteNumero')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">Cidade:</label>
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
                    <label for="">Bairro:</label>
                    <input class="form-control" type="text" name="solicitanteBairro" id="solicitanteBairro" placeholder="Bairro" value="{{$enderecos->BAIRRO}}">
                    @error('solicitanteBairro')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">UF</label>
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
                    <label for="">Complemento:</label>
                    <input class="form-control" type="text" name="solicitanteComplemento" id="solicitanteComplemento" placeholder="Complemento" value="{{$enderecos->COMPLEMENTO}}">
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