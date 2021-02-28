@extends('templates.template-admin')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary padding-top-15">Serviços prestados</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Solicitante</th>
                            <th scope="col">Data do serviço</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Status</th>
                            <th scope="col">Pagamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicosPrestados as $servicoPrestado)
                        <tr>
                            <th scope="row">{{$servicoPrestado->NOME_SOLICITANTE}}</th>
                            <td>{{$servicoPrestado->DATA_SERVICO}}</td>
                            <td>R${{$servicoPrestado->VALOR}}</td>

                            @if ($servicoPrestado->STATUS_SERVICO === 3)
                                <td>Pendente</td>
                            @elseif ($servicoPrestado->STATUS_SERVICO === 4)
                                <td>Aprovado</td>
                            @elseif ($servicoPrestado->STATUS_SERVICO === 5)
                                <td>Cancelado</td>
                            @endif

                            @if ($servicoPrestado->STATUS_APROVACAO == '' || $servicoPrestado->STATUS_APROVACAO == null)
                                <td>Pendente</td>
                            @elseif ($servicoPrestado->STATUS_APROVACAO == 'approved')
                                <td>Aprovado</td>
                            @elseif ($servicoPrestado->STATUS_APROVACAO === 'refunded')
                                <td>Cancelado</td>
                            @endif
                            <td>
                                <a data-toggle="modal" data-target="#modalVisualizarServico" href="">
                                    <button class="btn btn-primary" onclick="getProposta({{$servicoPrestado->ID_PROPOSTA}})">Visualizar</button>
                                </a>
                                <a href="">
                                    <button class="btn btn-danger" onclick="estorno({{$servicoPrestado->ID_PAGAMENTO}})">Cancelar</button>
                                </a>
                            </td>  
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal cadastro -->
<div class="modal fade bd-example-modal-lg" id="modalVisualizarServico" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal">Informações servicoPrestado </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (!empty($servicoPrestado))
                    <form name="formExibicaoServico" id="formExibicaoServico" method="post" action="">
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Nome do solicitante</label>
                                <input class="form-control"type="text" name="solicitanteNome" id="solicitanteNome" value=""><br>                                         
                            </div>
                            <div class="col">
                                <label for="">Nome do paciente</label>
                                <input class="form-control"type="text" name="pacienteNome" id="pacienteNome" value=""><br>                                       
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Familiaridade do solicitante</label>
                                <select name="familiaridade" class="custom-select" value="{{old('familiaridade')}}" >
                                    @foreach($familiaridades as $familiaridade)
                                        <option value="{{$familiaridade->ID}}">{{$familiaridade->FAMILIARIDADE}}</option>
                                    @endforeach
                                </select>                                       
                            </div>
                            <div class="col">
                                <label for="">Familiaridade Outros</label>
                                <input class="form-control"type="text" name="familiaridadeOutros" id="familiaridadeOutros" value=""><br>                                       
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Tipo paciente</label>
                                <input class="form-control"type="text" name="pacienteTipo" id="pacienteTipo" value=""><br>     
                            </div>
                            <div class="col">
                                <label for="">Localização do paciente</label>
                                <input class="form-control"type="text" name="pacienteLocalizacao" id="pacienteLocalizacao" value=""><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">CEP</label>
                                <input class="form-control"type="text" name="pacienteCep" id="pacienteCep" value=""><br>     
                            </div>
                            <div class="col">
                                <label for="">Endereço</label>
                                <input class="form-control"type="text" name="pacienteEndereco" id="pacienteEndereco" value=""><br> 
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Bairro</label>
                                <input class="form-control"type="text" name="pacienteBairro" id="pacienteBairro" value=""><br>       
                            </div>
                            <div class="col">
                                <label for="">Número</label>
                                <input class="form-control"type="text" name="pacienteNumero" id="pacienteNumero" value=""><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Cidade</label>
                                <input class="form-control"type="text" name="pacienteCidade" id="pacienteCidade" value=""><br>     
                            </div>
                            <div class="col">
                                <label for="">Estado</label>
                                <input class="form-control"type="text" name="pacienteEstado" id="pacienteEstado" value=""><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Complemento</label>
                                <input class="form-control"type="text" name="pacienteComplemento" id="pacienteComplemento" value=""><br>     
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Serviços a serem realizados</label><br>
                                @foreach($servicos as $servico)
                                    <input type="checkbox" name="servicos" id="servicos" value="{{$servico->ID}}"> {{$servico->TIPO}}<br> 
                                @endforeach  
                            </div>
                            <div class="col">
                                <label for="">Serviços outros</label>
                                <input class="form-control"type="text" name="servicoOutros" id="servicoOutros" value=""><br>      
                            </div>
                        </div>
                        <br>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Toma medicamentos?</label><br>
                                <input type="radio" name="tomaMedicamento" id="tomaMedicamento" value="1"> Sim <br> 
                                <input type="radio" name="tomaMedicamento" id="tomaMedicamento" value="0"> Não    
                            </div>
                            <div class="col">
                                <label for="">Tipo medicamentos</label>
                                <input class="form-control"type="text" name="tipoMedicamento" id="tipoMedicamento" value=""><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Data serviço</label><br>  
                                <input class="form-control"type="text" name="servicoDataPrestacao" id="servicoDataPrestacao" value=""><br>      
                            </div>
                            <div class="col">
                                <label for="">Valor</label><br>  
                                <input class="form-control"type="text" name="servicoValor" id="servicoValor" value=""><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Hora de início</label>
                                <input class="form-control"type="text" name="servicoInicio" id="servicoInicio" value=""><br>      
                            </div>
                            <div class="col">
                                <label for="">Hora de fim</label>
                                <input class="form-control"type="text" name="servicoFim" id="servicoFim" value=""><br>      
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection