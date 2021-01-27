@extends('templates.template-admin')
@section('content')
<h1 class="text-center">Preencha os dados do adminstrador</h1>
    <form name="formAdmin" id="formAdmin" method="post" action="{{url('admin')}}">  
        <div class="card-body">       
            @csrf
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">Nome:</label>
                    <input class="form-control"type="text" name="adminNome" id="adminNome">
                    @error('adminNome')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="">CPF:</label>
                    <input class="form-control" type="adminCPF" name="adminCPF" id="cpf" value="{{old('adminCPF')}}"> 
                    @error('adminCPF')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">E-mail:</label>
                    <input class="form-control"type="email" name="adminEmail" id="adminEmail">
                    @error('adminEmail')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="">Telefone de contato:</label>
                    <input class="form-control" type="text" name="adminTelefone" id="adminTelefone" value="{{old('adminTelefone')}}">
                    @error('adminTelefone')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">Senha:</label>
                    <input class="form-control" type="password" name="adminSenha" id="adminSenha" value="{{old('adminSenha')}}">
                    @error('adminSenha')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="">Confirme a senha:</label>
                    <input class="form-control" type="password" name="adminConfirmarSenha" id="adminConfirmarSenha" value="{{old('adminConfirmarSenha')}}">
                    @error('adminConfirmarSenha')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">CEP:</label>
                    <input class="form-control" type="text" name="adminCep" id="adminCep" value="{{old('adminCep')}}">
                    @error('adminCep')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">Endereço:</label>
                    <input class="form-control" type="text" name="adminEndereco" id="adminEndereco" value="{{old('adminEndereco')}}">
                    @error('adminEndereco')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="">Número:</label>
                    <input class="form-control" type="text" name="adminNumero" id="adminNumero" value="{{old('adminNumero')}}">
                    @error('adminNumero')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">Cidade:</label>
                    <select class ="form-control" name="adminCidade" id="adminCidade" value="{{old('adminCidade')}}">
                        <option value=""></option>
                        @foreach($cidades as $cidade)
                            <option value="{{$cidade->ID}}">{{$cidade->CIDADE}}</option>
                        @endforeach
                    </select>   
                    @error('adminCidade')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="">Bairro:</label>
                    <input class="form-control" type="text" name="adminBairro" id="adminBairro" value="{{old('adminBairro')}}">
                    @error('adminBairro')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">Estado:</label>
                    <select class ="form-control"name="adminEstado" id="adminEstado" value="{{old('adminEstado')}}">
                        <option value=""></option>
                        @foreach($estados as $estado)
                            <option value="{{$estado->ID}}">{{$estado->UF}}</option>
                        @endforeach
                    </select>   
                    @error('adminEstado')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror   
                </div>
                <div class="col">
                    <label for="">Complemento:</label>
                    <input class="form-control" type="text" name="adminComplemento" id="adminComplemento" value="{{old('adminComplemento')}}">
                </div>
            </div>
            <br>
            <input class="btn btn-primary" type="submit" value="Cadastrar">
        </div>
    </form>
@endsection