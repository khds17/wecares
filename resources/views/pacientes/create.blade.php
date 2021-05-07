@extends('templates.template-admin')
@section('content')
<h1 class="text-center">Cadastro de paciente</h1>
    <form name="formPaciente" id="formPaciente" method="post" enctype="multipart/form-data" action="{{url('paciente')}}">   
        @csrf 
        <div class="card-body"> 
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">Nome completo</label>
                    <input class="form-control"type="text" name="pacienteNome" id="pacienteNome" value="">
                    @error('pacienteNome')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="pacienteTipo">O paciente é?</label><br>
                    <select name="pacienteTipo" class="custom-select">
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
                    <label for="localidadePaciente">Onde o paciente está localizado?</label><br>
                    <select name="pacienteLocalizacao" class="custom-select">
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
                    <label for="cep">CEP</label>
                    <input class="form-control" type="text" name="pacienteCep" id="pacienteCep" value="">
                    @error('pacienteCep')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="endereco">Endereço</label>
                    <input class="form-control" type="text" name="pacienteEndereco" id="pacienteEndereco" value="">
                    @error('pacienteEndereco')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="numero">Número</label>
                    <input class="form-control" type="text" name="pacienteNumero" id="pacienteNumero" value="">
                    @error('pacienteNumero')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="cidade">Cidade</label>
                    <select class ="form-control"name="pacienteCidade" id="pacienteCidade">
                        <option value=""></option>
                        @foreach($cidades as $cidade)
                            <option value="{{$cidade->ID}}">{{$cidade->CIDADE}}</option>
                        @endforeach
                    </select>   
                    @error('pacienteCidade')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="bairro">Bairro</label>
                    <input class="form-control" type="text" name="pacienteBairro" id="pacienteBairro" value="">
                    @error('pacienteBairro')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="estado">Estado</label>
                    <select class ="form-control"name="pacienteEstado" id="pacienteEstado" value="">
                        <option value=""></option>
                        @foreach($estados as $estado)
                            <option value="{{$estado->ID}}">{{$estado->UF}}</option>
                        @endforeach
                    </select>  
                    @error('pacienteEstado')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="complemento">Complemento</label>
                    <input class="form-control" type="text" name="pacienteComplemento" id="pacienteComplemento" value="">
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="medicamento">Paciente toma medicamentos?</label><br>
                        <input type="radio" name="tomaMedicamento" id="tomaMedicamento" value="1" onclick="exibirTipoMedicamentos(this.value)"> Sim <br> 
                        <input type="radio" name="tomaMedicamento" id="tomaMedicamento" value="0" onclick="exibirTipoMedicamentos(this.value)"> Não
                        @error('tomaMedicamento')
                            <span class="text-danger"><small>{{$message}}</small></span>
                        @enderror
                </div>
                <div class="col d-none" id="medicamentos">
                    <label for="tipoMedicamento">Quais remédios?</label>
                    <input class="form-control" type="text" name="tipoMedicamento" id="tipoMedicamento" value="">
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                <label for="familiaridade" >Qual seu nível de familiaridade com o paciente?</label>
                <select name="familiaridade" class="custom-select" onchange="exibirOutrosFamiliaridade(this.value)">
                    <option value=""></option>
                    @foreach($familiaridades as $familiaridade)
                        <option value="{{$familiaridade->ID}}">{{$familiaridade->FAMILIARIDADE}}</option>
                    @endforeach
                </select>    
                    @error('familiaridade')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror     
                </div>
                <div class="col d-none" id="familiar">
                    <label for="familiaridadeOutros">Descreva o que é do paciente</label>
                    <input class="form-control"type="text" name="familiaridadeOutros" id="familiaridadeOutros" value="">
                </div>
            </div>
            <br>
            <input class="btn btn-primary" type="submit" value="Salvar">
        </div>
    </form>
    {{-- Fim do formulario --}}
@endsection