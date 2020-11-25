@extends('templates.template-admin')
@section('content')
    {{-- Inicio do formulario --}}
    <form name="formPaciente" id="formPaciente" method="post" enctype="multipart/form-data" action="{{url('paciente')}}">   
        @csrf 
        <div class="row margin-top-10">
            <div class="col">
                <label for="">Nome:</label>
                <input class="form-control"type="text" name="pacienteNome" id="pacienteNome" placeholder="Nome do paciente" value="">
                @error('pacienteNome')
                    <span class="text-danger"><small>{{$message}}</small></span>
                @enderror
            </div>
        </div>
        <br>
        <div class="row margin-top-10">
            <div class="col">
                <label for="pacienteTipo" class="text-dark">O paciente é?</label><br>
                <select name="pacienteTipo" class="custom-select">
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
                <select name="pacienteLocalizacao" class="custom-select">
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
                <label for="">CEP:</label>
                <input class="form-control" type="text" name="pacienteCep" id="pacienteCep" placeholder="CEP" value="">
                @error('pacienteCep')
                    <span class="text-danger"><small>{{$message}}</small></span>
                @enderror
            </div>
        </div>
        <br>
        <div class="row margin-top-10">
            <div class="col">
                <label for="">Endereço:</label>
                <input class="form-control" type="text" name="pacienteEndereco" id="pacienteEndereco" placeholder="Endereço" value="">
                @error('pacienteEndereco')
                    <span class="text-danger"><small>{{$message}}</small></span>
                @enderror
            </div>
            <div class="col">
                <label for="">Número:</label>
                <input class="form-control" type="text" name="pacienteNumero" id="pacienteNumero" placeholder="Número" value="">
                @error('pacienteNumero')
                    <span class="text-danger"><small>{{$message}}</small></span>
                @enderror
            </div>
        </div>
        <br>
        <div class="row margin-top-10">
            <div class="col">
                <select class ="form-control"name="pacienteCidade" id="pacienteCidade">
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
                <input class="form-control" type="text" name="pacienteBairro" id="pacienteBairro" placeholder="Bairro" value="">
                @error('pacienteBairro')
                    <span class="text-danger"><small>{{$message}}</small></span>
                @enderror
            </div>
        </div>
        <br>
        <div class="row margin-top-10">
            <div class="col">
                <select class ="form-control"name="pacienteEstado" id="pacienteEstado" value="">
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
                <input class="form-control" type="text" name="pacienteComplemento" id="pacienteComplemento" placeholder="Complemento" value="">
            </div>
        </div>
        <br>
        <div class="row margin-top-10">
            <div class="col font-color-gray">
                <label for="formacao">Paciente toma medicamentos?</label><br>
                    <input type="radio" name="tomaMedicamento" id="tomaMedicamento" value="1"> Sim <br> 
                    <input type="radio" name="tomaMedicamento" id="tomaMedicamento"value="0"> Não
                    <input class="form-control" type="text" name="tipoMedicamento" id="tipoMedicamento" placeholder="Quais?" value="">
                @error('tomaMedicamento')
                    <span class="text-danger"><small>{{$message}}</small></span>
                @enderror
            </div>
        </div>
        <br>
        <div class="row margin-top-10">
            <div class="col">
            <label for="familiaridade" class="text-dark">Qual seu nível de familiaridade com o paciente?</label>
            <select name="familiaridade" class="custom-select" value="">
                @foreach($familiaridades as $familiaridade)
                    <option value="{{$familiaridade->ID}}">{{$familiaridade->FAMILIARIDADE}}</option>
                @endforeach
            </select>    
                @error('familiaridade')
                    <span class="text-danger"><small>{{$message}}</small></span>
                @enderror     
            </div>
            <div class="col">
                <input class="form-control"type="text" name="familiaridadeOutros" id="familiaridadeOutros" placeholder="Descreva o que é do paciente" value="">
            </div>
        </div>
        <br>
        <input class="btn btn-primary" type="submit" value="Salvar">
    </form>
    {{-- Fim do formulario --}}
@endsection