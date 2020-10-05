@extends('templates.template')
@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h1 class="text-center padding-top-50">@if(isset($edit)) Editar @else Preencha os dados do solicitante @endif</h1>
                    <div class="card-body">
                        @if(isset($edit))
                        <!-- Abertura do formulário de edição solicitante -->
                        <form name="formEdit" id="formEdit" method="post" action="{{url("solicitante/$edit->id")}}">
                            @method('PUT') 
                        @else
                        <!-- Abertura do formulário de cadastro solicitante -->
                        <form name="formSolictante" id="formSolictante" method="post" action="{{url('solicitante')}}"> 
                        @endif        
                            @csrf
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control"type="text" name="solicitanteNome" id="solicitanteNome" placeholder="Nome:" required value="{{$edit->nome ?? ''}}"><br>
                                </div>
                                <div class="col">
                                    <input class="form-control"type="email" name="solicitanteEmail" id="solicitanteEmail" placeholder="E-mail:" required value="{{$edit->email ?? ''}}">
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                <input class="form-control" type="password" name="solicitanteSenha" id="solicitanteSenha" placeholder="Senha" required>
                                </div>
                                <div class="col">
                                <input class="form-control" type="password" name="solicitanteConfirmarSenha" id="solicitanteConfirmarSenha" placeholder="Confirme a senha" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteCep" id="solicitanteCep" placeholder="CEP" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteEndereco" id="solicitanteEndereco" placeholder="Endereço" required>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteNumero" id="solicitanteNumero" placeholder="Número" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteCidade" id="solicitanteCidade" placeholder="Cidade" required>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteBairro" id="solicitanteBairro" placeholder="Bairro" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteComplemento" id="solicitanteComplemento" placeholder="Complemento" required>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteEstado" id="solicitanteEstado" placeholder="UF" required><br>
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
                        </form> 
                        <!-- Fechamento do formulário de cadastro -->
                        </form> 
                        <hr>
                        <!-- Fechamento do formulário de edição -->
                        <!-- Abertura do formulário de paciente -->
                        <h1 class="text-center">Preencha os dados do paciente</h1>
                        <form name="formPaciente" id="formPaciente" method="post" action="{{url('paciente')}}"> 
                            @csrf
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control"type="text" name="nomePaciente" id="nomePaciente" placeholder="Nome do paciente:" required"><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <label for="idadePaciente" class="text-dark">O paciente é?</label><br>
                                    <select name="select" class="custom-select" required>
                                            <option value="valor1">Ex: Bebê, adulto ou criança</option> 
                                            <option value="valor1">Bebê</option> 
                                            <option value="valor1">Criança</option> 
                                            <option value="valor1">Adolescente</option>
                                            <option value="valor1">Adulto</option>
                                            <option value="valor1">Idoso</option>
                                    </select>                                  
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <label for="localidadePaciente" class="text-dark">Onde o paciente está localizado?</label><br>
                                    <select name="select" class="custom-select" required>
                                        <option value="valor1">Casa de retiro</option> 
                                        <option value="valor1">Hospital</option> 
                                        <option value="valor1">Residência</option>
                                     </select>   
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="pacienteCep" id="pacienteCep" placeholder="CEP" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="pacienteEndereco" id="pacienteEndereco" placeholder="Endereço" required>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="pacienteNumero" id="pacienteNumero" placeholder="Número" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="pacienteCidade" id="pacienteCidade" placeholder="Cidade" required>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="pacienteBairro" id="pacienteBairro" placeholder="Bairro" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="pacienteComplemento" id="pacienteComplemento" placeholder="Complemento" required>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="pacienteEstado" id="pacienteEstado" placeholder="UF" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label for="formacao">Serviços que deverão ser realizados</label><br>
                                    <input type="checkbox" name="acompanhamentos" id="acompanhamentos"> Acompanhamentos em saídas <br> 
                                    <input type="checkbox" name="medicamentos" id="medicamentos"> Administratação de medicamentos <br> 
                                    <input type="checkbox" name="refeicao" id="refeicao"> Administratação de refeições <br> 
                                    <input type="checkbox" name="banho" id="banho"> Banho <br> 
                                    <input type="checkbox" name="companhia" id="companhia"> Companhia <br> 
                                    <input type="checkbox" name="outros" id="outros"> <input class="form-control" type="text" name="servicoOutros" id="servicoOutros" placeholder="Outros"><br>
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