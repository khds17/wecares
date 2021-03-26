@extends('templates.template')
@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary">
    <div class="page-header-content py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 text-center">
                    @if (count($prestadores) >= 1)
                        <h1 class="page-header-title">Profissionais encontrados</h1>
                    @else
                        <h1 class="page-header-title">Não foi possível encontrar profissionais para esta cidade</h1>
                    @endif
                </div>
            </div>
        </div>
        <div class="container padding-top-50">
            <div class="row features text-center mb-10">
                @foreach ($prestadores as $prestador)
                <div class="col-lg-4 col-md-6 mb-5">
                    <a class="card card-link border-top border-top-lg border-primary h-100 lift">
                        <div class="card-body p-5">
                            {{-- <div class="icon-stack icon-stack-lg bg-primary-soft text-primary mb-4"><i data-feather="user"></i></div> --}}
                            <input type="image" src="{{url("storage/{$prestador->FOTO}")}}" width="100" height="100">
                            <input type="hidden" id="idPrestador[{{$prestador->ID}}]" name="idPrestador" value="{{$prestador->ID}}">
                            <h6>{{$prestador->NOME}}</h6>
                            <div class="small text-gray-500 text-left">Formação: {{$prestador->FORMACAO}}</div>
                            {{-- <div class="small text-gray-500 text-left">Serviço realizados:</div>
                            <div class="small text-gray-500 text-left">Avaliação</div>    --}}

                        </div>
                        <div class="card-footer bg-transparent border-top d-flex align-items-center justify-content-center">
                            <input type="checkbox" name="checkPrestador" id="checkPrestador[{{$prestador->ID}}]" value="{{$prestador->ID}}" style="cursor: pointer">&nbsp
                            <div class="small text-primary">Selecionar</div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="svg-border-rounded text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
        </div>
    </div>
    @if (count($prestadores) >= 1)
        <div style="position: fixed; bottom: 35px; width: 90%; height: 100px;">
            <div class="float-right">
                <a class="btn-cyan btn rounded-pill px-4 ml-lg-4" data-toggle= "modal" data-target="#modalServico" onclick="selectPrestadores()">Solicitar serviço</a>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="modalServico" tabindex="-1" role="dialog" aria-labelledby="modalServicoLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalServicoLabel">Informações da solicitação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form name="formProposta" id="formProposta" method="post" enctype="multipart/form-data" action="{{url('proposta')}}">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" id="idPrestadores" name="idPrestadores">
                                <label for="paciente" class="text-dark">Paciente</label><br>
                                <select name="selectPaciente" id="selectPaciente" class="custom-select" onchange="getPaciente(this.value)">
                                    <option value="">Escolha um paciente</option>
                                    @foreach ($pacientes as $paciente)
                                        <option value="{{$paciente->ID}}">{{$paciente->NOME}}</option>
                                    @endforeach
                                </select>
                                @error('selectPaciente')
                                    <span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <label for="paciente" class="text-dark">O paciente é?</label><br>
                                    <select name="pacienteTipo" id="pacienteTipo" class="custom-select">
                                        <option value=""></option>
                                        @foreach($pacientesTipos as $tipo)
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
                                    <label for="paciente" class="text-dark">Qual a sua familiaridade com o paciente?</label><br>
                                    <select name="familiaridade" id="familiaridade" class="custom-select" value="">
                                        <option value=""></option>
                                        @foreach($familiaridades as $familiaridade)
                                            <option value="{{$familiaridade->ID}}">{{$familiaridade->FAMILIARIDADE}}</option>
                                        @endforeach
                                    </select>
                                    @error('familiaridade')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="familiaridade" class="text-dark">Descreva o que é do paciente</label>
                                    <input class="form-control"type="text" name="familiaridadeOutros" id="familiaridadeOutros" value="">
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <label for="paciente" class="text-dark">Onde o paciente está localizado?</label><br>
                                    <select name="pacienteLocalizacao" id="pacienteLocalizacao" class="custom-select">
                                        <option value=""></option>
                                        @foreach($pacientesLocalizacao as $localizacao)
                                                <option value="{{$localizacao->ID}}" >{{$localizacao->LOCALIZACAO}}</option>
                                        @endforeach
                                    </select>
                                    @error('pacienteLocalizacao')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            @foreach ($enderecos as $endereco)
                                @if ($paciente->ID_ENDERECO == $endereco->ID)
                                    <div class="row margin-top-10">
                                        <div class="col">
                                            <input class="form-control" type="text" name="pacienteCep" id="pacienteCep" placeholder="CEP" value="">
                                            @error('pacienteCep')
                                                <span class="text-danger"><small>{{$message}}</small></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row margin-top-10">
                                        <div class="col">
                                            <input class="form-control" type="text" name="pacienteEndereco" id="pacienteEndereco" placeholder="Endereço" value="">
                                            @error('pacienteEndereco')
                                                <span class="text-danger"><small>{{$message}}</small></span>
                                            @enderror
                                        </div>
                                        <div class="col">
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
                                            <input class="form-control" type="text" name="pacienteComplemento" id="pacienteComplemento" placeholder="Complemento" value="">
                                        </div>
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
                                    </div>
                                @endif
                            @endforeach
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label for="opcaoDeServicos">Serviços que deverão ser realizados</label><br>
                                    @foreach($servicos as $servico)
                                        <input type="checkbox" name="servicos[]" id="servicos[]" value="{{$servico->ID}}"> {{$servico->TIPO}} <br>
                                    @endforeach
                                    <input class="form-control" type="text" name="servicoOutros" id="servicoOutros" placeholder="Outros"><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label for="tomaMedicamento">Paciente toma medicamentos?</label><br>
                                    <input type="radio" name="tomaMedicamento" id="tomaMedicamento" value="1"> Sim <br>
                                    <input type="radio" name="tomaMedicamento" id="tomaMedicamento" value="0"> Não <br>
                                    @error('tomaMedicamento')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col font-color-gray">
                                    <label for="tipoMedicamentos">Quais medicamentos?</label><br>
                                    <input class="form-control" type="text" name="tipoMedicamento" id="tipoMedicamento" value="">
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label class ="" for="inicio">Data do inicio do serviço:</label><br>
                                    <input class="form-control" type="date" name="dataInicio" id="dataInicio">
                                    @error('dataInicio')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col font-color-gray">
                                    <label class ="" for="fim">Data fim do serviço:</label><br>
                                    <input class="form-control" type="date" name="dataFim" id="dataFim">
                                    @error('dataFim')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label class ="" for="horaroInicio">Horário de início</label><br>
                                    <input class="form-control" type="time" name="horaInicio" id="horaInicio" placeholder="Horário de início">
                                    @error('horaInicio')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                                <div class="col font-color-gray">
                                    <label class ="" for="horaroFim">Horário fim</label><br>
                                    <input class="form-control" type="time" name="horaFim" id="horaFim" placeholder="Horário do fim" onchange="calcularServicos()">
                                    @error('horaFim')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <!-- <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label class ="" for="">Adicionar mais</label><br>
                                </div>
                            </div>
                            <br> -->
                            <div class="row margin-top-10" id="servicos" >
                                <div class="col font-color-gray">
                                    <label class="" for="formacao">Valor total do serviço: R$</label>
                                    <input class="" type="text" name="propostaValorSimulacao" id="propostaValorSimulacao">
                                    <input class="" type="hidden" name="precoServico" id="precoServico" value="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input class="btn btn-teal btn-block btn-marketing rounded-pill" type="submit" value="Enviar proposta">
                            </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div style="position: fixed; bottom: 35px; width: 90%; height: 100px;">
            <div class="float-right">
            <a class="btn-cyan btn rounded-pill px-4 ml-lg-4" href="{{url('/encontreCuidador')}}">Encontrar cuidadores</a>
            </div>
        </div>
    @endif
</header>
@endsection