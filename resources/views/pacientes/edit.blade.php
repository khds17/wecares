@extends('templates.template-admin')
@section('content')
<h1 class="text-center">Edição dos dados cadastrais</h1>
    <form name="formPacienteEdit" id="formPacienteEdit" method="post" enctype="multipart/form-data" action="{{url("paciente/$paciente->ID")}}">   
        @csrf
        @method('PUT')
        <div class="card-body"> 
            <div class="row margin-top-10">
                <div class="col">
                    <label for="">Nome completo</label>
                    <input class="form-control"type="text" name="pacienteNome" id="pacienteNome" value="{{$paciente->NOME}}">
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
                        @foreach($pacientesTipos as $tipo)
                                <option value="{{$tipo->ID}}" {{($paciente->ID_TIPO == $tipo->ID) ? 'selected' : ''}}>{{$tipo->TIPO}}</option>
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
                        @foreach($pacientesLocalizacao as $localizacao)
                                <option value="{{$localizacao->ID}}" {{($paciente->ID_LOCALIZACAO == $localizacao->ID) ? 'selected' : ''}}>{{$localizacao->LOCALIZACAO}}</option>
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
                    <input class="form-control" type="text" name="pacienteCep" id="pacienteCep" value="{{$endereco->CEP}}">
                    @error('pacienteCep')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="endereco">Endereço</label>
                    <input class="form-control" type="text" name="pacienteEndereco" id="pacienteEndereco" value="{{$endereco->ENDERECO}}">
                    @error('pacienteEndereco')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="numero">Número</label>
                    <input class="form-control" type="text" name="pacienteNumero" id="pacienteNumero" value="{{$endereco->NUMERO}}">
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
                        <option value="">Cidade</option>
                        @foreach($cidades as $cidade)
                            <option value="{{$cidade->ID}}" {{($paciente->ID_ENDERECO == $endereco->ID && $cidade->ID == $endereco->ID_CIDADE) ? 'selected' : ''}}>{{$cidade->CIDADE}}</option>
                        @endforeach
                    </select>   
                    @error('pacienteCidade')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="bairro">Bairro</label>
                    <input class="form-control" type="text" name="pacienteBairro" id="pacienteBairro" value="{{$endereco->BAIRRO}}">
                    @error('pacienteBairro')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="estado">Estado</label>
                    <select class ="form-control"name="pacienteEstado" id="pacienteEstado" value="{{old('pacienteEstado')}}">
                        <option value="">Estado</option>
                        @foreach($estados as $estado)
                            <option value="{{$estado->ID}}" {{($paciente->ID_ENDERECO == $endereco->ID && $estado->ID == $endereco->ID_ESTADO) ? 'selected' : ''}}>{{$estado->UF}}</option>
                        @endforeach
                    </select>  
                    @error('pacienteEstado')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="complemento">Complemento</label>
                    <input class="form-control" type="text" name="pacienteComplemento" id="pacienteComplemento" value="{{$endereco->COMPLEMENTO}}">
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="formacao">Paciente toma medicamentos?</label><br>
                    <input type="radio" name="tomaMedicamento" id="tomaMedicamento" value="1" {{($paciente->TOMA_MEDICAMENTOS == 1) ? 'checked' : ''}}> Sim <br> 
                    <input type="radio" name="tomaMedicamento" id="tomaMedicamento"value="0" {{($paciente->TOMA_MEDICAMENTOS == 0) ? 'checked' : ''}}> Não                    
                    @error('tomaMedicamento')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="col">
                    <label for="formacao">Quais medicamentos?</label><br>
                    <input class="form-control" type="text" name="tipoMedicamento" id="tipoMedicamento" value="{{$paciente->TIPO_MEDICAMENTOS}}">
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="familiaridade" class="text-dark">Qual seu nível de familiaridade com o paciente?</label>
                    <select name="familiaridade" class="custom-select" value="{{old('familiaridade')}}">
                        @foreach($familiaridades as $familiaridade)
                            <option value="{{$familiaridade->ID}}" {{($paciente->ID_FAMILIARIDADE == $familiaridade->ID) ? 'selected' : ''}}>{{$familiaridade->FAMILIARIDADE}}</option>
                        @endforeach
                    </select>    
                    @error('familiaridade')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror     
                </div>
                <div class="col">
                    <label for="familiaridade" class="text-dark">Descreva o que é do paciente</label>
                    <input class="form-control"type="text" name="familiaridadeOutros" id="familiaridadeOutros" value="{{$solicitante->FAMILIAR_OUTROS}}">
                </div>
            </div>
            <br>
            <input class="btn btn-primary" type="submit" value="Salvar">
        </div>
    </form>
    {{-- Fim do formulario --}}
@endsection