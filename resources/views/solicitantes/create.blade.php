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
                                    <input class="form-control"type="text" name="solicitanteNome" id="solicitanteNome" placeholder="Nome" required value="{{$edit->nome ?? ''}}"><br>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteCPF" id="solicitanteCPF" placeholder="CPF" required> 
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control"type="email" name="solicitanteEmail" id="solicitanteEmail" placeholder="E-mail" required value="{{$edit->email ?? ''}}">
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteNumero" id="solicitanteNumero" placeholder="Número do celular" required ><br>
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
                                    <select class ="form-control"name="solicitanteCidade" id="solicitanteCidade" required>
                                        <option value="">Cidade</option>
                                        @foreach($cidades as $cidade)
                                            <option value="{{$cidade->ID}}">{{$cidade->CIDADE}}</option>
                                        @endforeach
                                    </select>   
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteBairro" id="solicitanteBairro" placeholder="Bairro" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <select class ="form-control"name="solicitanteEstado" id="solicitanteEstado" required>
                                        <option value="">Estado</option>
                                        @foreach($estados as $estado)
                                            <option value="{{$estado->ID}}">{{$estado->UF}}</option>
                                        @endforeach
                                    </select>  
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteComplemento" id="solicitanteComplemento" placeholder="Complemento">  
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                <label for="familiaridade" class="text-dark">Qual seu nível de familiaridade com o paciente?</label><br>
                                <select name="familiaridade" class="custom-select" required>
                                            <option value="pai/mae">Sou pai/mãe</option> 
                                            <option value="filho/filha">Sou filho/filha</option>
                                            <option value="avô/avó">Sou avô/avó</option>
                                            <option value="tio/tia">Sou tio/tia</option> 
                                            <option value="neto/neta">Sou neto/neta</option> 
                                            <option value="primo/prima">Sou primo/prima</option>
                                            <option value="outros">Outros</option>
                                    </select>         
                                </div>
                                <div class="col">
                                    <input class="form-control"type="text" name="familiaridadeOutros" id="familiaridadeOutros" placeholder="Nivel familiaridade outros:" value="{{$edit->nivelfamiliaridadeoutros ?? ''}}"><br>
                                </div>
                            </div>
                            <br>
                            <h1 class="text-center">Preencha os dados do paciente</h1>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control"type="text" name="nomePaciente" id="nomePaciente" placeholder="Nome do paciente" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <label for="idadePaciente" class="text-dark">O paciente é?</label><br>
                                    <select name="tipoPaciente" class="custom-select" required>
                                            <option value="">Ex: Bebê, adulto ou criança</option> 
                                            <option value="bebe">Bebê</option> 
                                            <option value="crianca">Criança</option> 
                                            <option value="adolescente">Adolescente</option>
                                            <option value="adulto">Adulto</option>
                                            <option value="idoso">Idoso</option>
                                    </select>                                  
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <label for="localidadePaciente" class="text-dark">Onde o paciente está localizado?</label><br>
                                    <select name="localizacaoPaciente" class="custom-select" required>
                                        <option value="retiro">Casa de retiro</option> 
                                        <option value="hospital">Hospital</option> 
                                        <option value="residencia">Residência</option>
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
                                    <select class ="form-control"name="pacienteCidade" id="prestadorCidade" required>
                                        <option value="">Cidade</option>
                                        @foreach($cidades as $cidade)
                                            <option value="{{$cidade->ID}}">{{$cidade->CIDADE}}</option>
                                        @endforeach
                                    </select>   
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="pacienteBairro" id="pacienteBairro" placeholder="Bairro" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <select class ="form-control"name="pacienteEstado" id="pacienteEstado" required>
                                        <option value="">Estado</option>
                                        @foreach($estados as $estado)
                                            <option value="{{$estado->ID}}">{{$estado->UF}}</option>
                                        @endforeach
                                    </select>  
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="pacienteComplemento" id="pacienteComplemento" placeholder="Complemento">
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label for="formacao">Serviços que deverão ser realizados</label><br>
                                    <input type="checkbox" name="servicos" id="acompanhamentos" value="acompanhamentos"> Acompanhamentos em saídas <br> 
                                    <input type="checkbox" name="servicos" id="medicamentos" value="medicamentos"> Administratação de medicamentos <br> 
                                    <input type="checkbox" name="servicos" id="refeicao" value="refeicao"> Administratação de refeições <br> 
                                    <input type="checkbox" name="servicos" id="banho" value="banho"> Banho <br> 
                                    <input type="checkbox" name="servicos" id="companhia" value="companhia"> Companhia <br> 
                                    <input type="checkbox" name="servicos" id="outros" value="sim"><input class="form-control" type="text" name="servicoOutros" id="servicoOutros" placeholder="Outros"><br>
                                </div>
                                <div class="col font-color-gray">
                                    <label for="formacao">Paciente toma medicamentos?</label><br>
                                    <input type="radio" name="medicamento" id="medicamento" value="sim"> Sim <br> 
                                    <input type="radio" name="medicamento" id="medicamento"value="Não"> Não
                                    <input class="form-control" type="text" name="tipoMedicamento" id="tipoMedicamento" placeholder="Quais?"><br>
                                </div>
                            </div>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Cadastrar">
                        </form>
                        <!-- Fechamento do formulário de cadastro solicitante -->
                        </form> 
                        <!-- Fechamento do formulário de edição solicitante -->
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