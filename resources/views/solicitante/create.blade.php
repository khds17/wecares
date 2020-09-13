@extends('templates.template')
@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h1 class="text-center padding-top-50">@if(isset($edit)) Editar @else Preencha os campos abaixo para se conectar a um cuidador @endif</h1>
                    <div class="card-body">
                        @if(isset($edit))
                        <form name="formEdit" id="formEdit" method="post" action="{{url("solicitante/$edit->id")}}">
                            @method('PUT') 
                        @else
                        <form name="formSolictante" id="formSolictante" method="post" action="{{url('solicitante')}}"> 
                        @endif        
                            @csrf
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control"type="text" name="nome" id="nome" placeholder="Nome:" value="{{$edit->nome ?? ''}}"><br>
                                </div>
                                <div class="col">
                                    <input class="form-control"type="email" name="email" id="email" placeholder="E-mail:" value="{{$edit->email ?? ''}}">
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
                                <div class="col">
                                    <input class="form-control"type="text" name="nivelfamiliaridade" id="nivelfamiliaridade" placeholder="Nivel familiaridade:" value="{{$edit->nivelfamiliaridade ?? ''}}">
                                </div>
                                <div class="col">
                                    <input class="form-control"type="text" name="nivelfamiliaridadeoutros" id="nivelfamiliaridadeoutros" placeholder="Nivel familiaridade outros:" value="{{$edit->nivelfamiliaridadeoutros ?? ''}}"><br>
                                </div>
                            </div>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Cadastrar">
                        </form> 
                        <!-- Fechamento do formulário de cadastro -->
                        </form> 
                        <!-- Fechamento do formulário de edição -->
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