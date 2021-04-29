@extends('templates.template')
@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h1 class="text-center padding-top-50">Cadastra-se como solicitante</h1>
                    <div class="card-body">
                        <!-- Abertura do formulário -->
                        <form name="formSolictante" id="formSolictante" method="post" action="{{url('solicitante')}}">       
                            @csrf
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control"type="text" name="solicitanteNome" id="solicitanteNome" placeholder="Nome" value="{{old('solicitanteNome')}}">
                                    @error('solicitanteNome')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <br>
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteCPF" id="solicitanteCPF" placeholder="CPF" value="{{old('solicitanteCPF')}}"> 
                                    @error('solicitanteCPF')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control"type="email" name="solicitanteEmail" id="solicitanteEmail" placeholder="E-mail" value="{{old('solicitanteEmail')}}">
                                    @error('solicitanteEmail')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteTelefone" id="solicitanteTelefone" placeholder="Número do celular" value="{{old('solicitanteTelefone')}}">
                                    @error('solicitanteTelefone')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>    
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="password" name="solicitanteSenha" id="solicitanteSenha" placeholder="Senha" value="{{old('solicitanteSenha')}}">
                                    @error('solicitanteSenha')
                                     <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="password" name="solicitanteConfirmarSenha" id="solicitanteConfirmarSenha" placeholder="Confirme a senha" value="{{old('solicitanteConfirmarSenha')}}">
                                    @error('solicitanteConfirmarSenha')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            {{-- <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteCep" id="solicitanteCep" placeholder="CEP" value="{{old('solicitanteCep')}}">
                                    @error('solicitanteCep')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteEndereco" id="solicitanteEndereco" placeholder="Endereço" value="{{old('solicitanteEndereco')}}">
                                    @error('solicitanteEndereco')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="solicitanteNumero" id="solicitanteNumero" placeholder="Número" value="{{old('solicitanteNumero')}}">
                                    @error('solicitanteNumero')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <select class ="form-control"name="solicitanteCidade" id="solicitanteCidade" value="{{old('solicitanteCidade')}}">
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
                                    <input class="form-control" type="text" name="solicitanteBairro" id="solicitanteBairro" placeholder="Bairro" value="{{old('solicitanteBairro')}}">
                                    @error('solicitanteBairro')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <select class ="form-control"name="solicitanteEstado" id="solicitanteEstado" value="{{old('solicitanteEstado')}}">
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
                                    <input class="form-control" type="text" name="solicitanteComplemento" id="solicitanteComplemento" placeholder="Complemento" value="{{old('solicitanteComplemento')}}">  
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col ">
                                <label for="familiaridade" class="text-dark">Qual seu nível de familiaridade com o paciente?</label>
                                    <select name="familiaridade" class="custom-select" value="{{old('familiaridade')}}" onchange="exibirOutrosFamiliaridade(this.value)">
                                        <option value=""></option>
                                        @foreach($familiaridades as $familiaridade)
                                            <option value="{{$familiaridade->ID}}">{{$familiaridade->FAMILIARIDADE}}</option>
                                        @endforeach
                                    </select>    
                                    @error('familiaridade')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror     
                                </div>
                                <div class="col d-none" id="familiaridadeOutros">
                                    <label for="familiaridadeOutros" class="text-dark">Descreva o que é do paciente</label>
                                    <input class="form-control"type="text" name="familiaridadeOutros" id="familiaridadeOutros" value="{{old('familiaridadeOutros')}}">
                                </div>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <h1 class="text-center">Preencha os dados do paciente</h1>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control"type="text" name="pacienteNome" id="pacienteNome" placeholder="Nome do paciente" value="{{old('pacienteNome')}}">
                                    @error('pacienteNome')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <label for="pacienteTipo" class="text-dark">O paciente é?</label><br>
                                    <select name="pacienteTipo" class="custom-select" value="{{old('pacienteTipo')}}">
                                        <option value=""></option>
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
                                    <select name="pacienteLocalizacao" class="custom-select" value="{{old('pacienteLocalizacao')}}">
                                        <option value=""></option>
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
                                    <input class="form-control" type="text" name="pacienteCep" id="pacienteCep" placeholder="CEP" value="{{old('pacienteCep')}}">
                                    @error('pacienteCep')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="pacienteEndereco" id="pacienteEndereco" placeholder="Endereço" value="{{old('pacienteEndereco')}}">
                                    @error('pacienteEndereco')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="pacienteNumero" id="pacienteNumero" placeholder="Número" value="{{old('pacienteNumero')}}">
                                    @error('pacienteNumero')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <select class ="form-control"name="pacienteCidade" id="pacienteCidade" value="{{old('pacienteCidade')}}">
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
                                    <input class="form-control" type="text" name="pacienteBairro" id="pacienteBairro" placeholder="Bairro" value="{{old('pacienteBairro')}}">
                                    @error('pacienteBairro')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <select class ="form-control"name="pacienteEstado" id="pacienteEstado" value="{{old('pacienteEstado')}}">
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
                                    <input class="form-control" type="text" name="pacienteComplemento" id="pacienteComplemento" placeholder="Complemento" value="{{old('pacienteComplemento')}}">
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label for="medicamentos">Paciente toma medicamentos?</label><br>
                                    <input type="radio" name="tomaMedicamento" id="tomaMedicamento" value="1" onclick="exibirTipoMedicamentos(this.value)"> Sim <br> 
                                    <input type="radio" name="tomaMedicamento" id="tomaMedicamento" value="0" onclick="exibirTipoMedicamentos(this.value)"> Não
                                    @error('tomaMedicamento')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col d-none" id="medicamentos">
                                    <label for="medicamentos" class="text-dark">Quais medicamentos?</label>
                                    <input class="form-control" type="text" name="tipoMedicamento" id="tipoMedicamento" value="{{old('tipoMedicamento')}}">
                                </div>
                            </div>
                            <br> --}}
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