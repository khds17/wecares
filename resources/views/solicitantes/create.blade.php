@extends('templates.template')
@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h1 class="text-center padding-top-50">@if(isset($edit)) Editar @else Preencha os dados do solicitante @endif</h1>
                    <div class="card-body">
                        <!-- Abertura do formulário -->
                        <form name="formSolictante" id="formSolictante" method="post" action="{{url('solicitante')}}">       
                            @csrf
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control"type="text" name="solicitanteNome" id="solicitanteNome" placeholder="Nome">
                                    @error('solicitanteNome')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <br>
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteCPF" id="solicitanteCPF" placeholder="CPF"> 
                                    @error('solicitanteCPF')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control"type="email" name="solicitanteEmail" id="solicitanteEmail" placeholder="E-mail">
                                    @error('solicitanteEmail')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteNumero" id="solicitanteNumero" placeholder="Número do celular">
                                    @error('solicitanteNumero')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>    
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="password" name="solicitanteSenha" id="solicitanteSenha" placeholder="Senha" >
                                    @error('solicitanteSenha')
                                     <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="password" name="solicitanteConfirmarSenha" id="solicitanteConfirmarSenha" placeholder="Confirme a senha">
                                    @error('solicitanteConfirmarSenha')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteCep" id="solicitanteCep" placeholder="CEP">
                                    @error('solicitanteCep')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteEndereco" id="solicitanteEndereco" placeholder="Endereço" >
                                    @error('solicitanteEndereco')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteNumero" id="solicitanteNumero" placeholder="Número">
                                    @error('solicitanteNumero')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <select class ="form-control"name="solicitanteCidade" id="solicitanteCidade" >
                                        <option value="">Cidade</option>
                                        @foreach($cidades as $cidade)
                                            <option value="{{$cidade->ID}}">{{$cidade->CIDADE}}</option>
                                        @endforeach
                                    </select>   
                                    @error('solicitanteCidade')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteBairro" id="solicitanteBairro" placeholder="Bairro">
                                    @error('solicitanteBairro')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <select class ="form-control"name="solicitanteEstado" id="solicitanteEstado" >
                                        <option value="">Estado</option>
                                        @foreach($estados as $estado)
                                            <option value="{{$estado->ID}}">{{$estado->UF}}</option>
                                        @endforeach
                                    </select>  
                                    @error('solicitanteEstado')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteComplemento" id="solicitanteComplemento" placeholder="Complemento">  
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                <label for="familiaridade" class="text-dark">Qual seu nível de familiaridade com o paciente?</label>
                                <select name="familiaridade" class="custom-select" >
                                    @foreach($familiaridades as $familiaridade)
                                       <option value="{{$familiaridade->ID}}">{{$familiaridade->FAMILIARIDADE}}</option>
                                    @endforeach
                                </select>    
                                    @error('familiaridade')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror     
                                </div>
                                <div class="col">
                                    <input class="form-control"type="text" name="familiaridadeOutros" id="familiaridadeOutros" placeholder="Descreva o que é do paciente">
                                </div>
                            </div>
                            <br>
                            <h1 class="text-center">Preencha os dados do paciente</h1>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control"type="text" name="pacienteNome" id="pacienteNome" placeholder="Nome do paciente">
                                    @error('pacienteNome')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <label for="pacienteTipo" class="text-dark">O paciente é?</label><br>
                                    <select name="pacienteTipo" class="custom-select" >
                                        @foreach($pacienteTipo as $tipo)
                                            <option value="{{$tipo->ID}}">{{$tipo->TIPO}}</option>
                                        @endforeach
                                    </select>     
                                    @error('pacienteTipo')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror                             
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <label for="localidadePaciente" class="text-dark">Onde o paciente está localizado?</label><br>
                                    <select name="pacienteLocalizacao" class="custom-select" >
                                        @foreach($pacienteLocalizacao as $localizacao)
                                            <option value="{{$localizacao->ID}}">{{$localizacao->LOCALIZACAO}}</option>
                                        @endforeach
                                    </select>   
                                    @error('pacienteLocalizacao')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="pacienteCep" id="pacienteCep" placeholder="CEP">
                                    @error('pacienteCep')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="pacienteEndereco" id="pacienteEndereco" placeholder="Endereço">
                                    @error('pacienteEndereco')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="pacienteNumero" id="pacienteNumero" placeholder="Número">
                                    @error('pacienteNumero')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <select class ="form-control"name="pacienteCidade" id="pacienteCidade" >
                                        <option value="">Cidade</option>
                                        @foreach($cidades as $cidade)
                                            <option value="{{$cidade->ID}}">{{$cidade->CIDADE}}</option>
                                        @endforeach
                                    </select>   
                                    @error('pacienteCidade')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="pacienteBairro" id="pacienteBairro" placeholder="Bairro">
                                    @error('pacienteBairro')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <select class ="form-control"name="pacienteEstado" id="pacienteEstado">
                                        <option value="">Estado</option>
                                        @foreach($estados as $estado)
                                            <option value="{{$estado->ID}}">{{$estado->UF}}</option>
                                        @endforeach
                                    </select>  
                                    @error('pacienteEstado')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="pacienteComplemento" id="pacienteComplemento" placeholder="Complemento">
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label for="formacao">Paciente toma medicamentos?</label><br>
                                    <input type="radio" name="tomaMedicamento" id="tomaMedicamento" value="Sim"> Sim <br> 
                                    <input type="radio" name="tomaMedicamento" id="tomaMedicamento"value="Nao"> Não
                                    <input class="form-control" type="text" name="tipoMedicamento" id="tipoMedicamento" placeholder="Quais?">
                                    @error('tomaMedicamento')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Cadastrar">
                        </form> 
                        <!-- Fechamento do formulário -->
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