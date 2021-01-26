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
                            <th scope="col">Paciente</th>
                            <th scope="col">Tipo do paciente</th>
                            <th scope="col">Data do serviço</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicosPrestados as $servicoPrestado)
                        <tr>
                            <th scope="row">{{$servicoPrestado->NOME_SOLICITANTE}}</th>
                            <td>{{$servicoPrestado->NOME_PACIENTE}}</td>
                            <td>{{$servicoPrestado->TIPO}}</td>
                            <td>{{$servicoPrestado->DATA_SERVICO}}</td>
                            <td>R${{$servicoPrestado->VALOR}}</td>
                            <td>
                                <a data-toggle="modal" data-target="#modalVisualizarServico" href="">
                                    <button class="btn btn-primary">Visualizar</button>
                                </a>
                                <a href="">
                                    <button class="btn btn-danger">Cancelar</button>
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
                                <input class="form-control"type="text" name="" id="" value="{{$servicoPrestado->NOME_SOLICITANTE}}" disabled><br>                                         
                            </div>
                            <div class="col">
                                <label for="">Nome do paciente</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoPrestado->NOME_PACIENTE}}" disabled><br>                                       
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Familiaridade do solicitante</label>
                                <select name="familiaridade" class="custom-select" value="{{old('familiaridade')}}" disabled>
                                    @foreach($familiaridades as $familiaridade)
                                        <option value="{{$familiaridade->ID}}" {{($servicoPrestado->ID_FAMILIARIDADE == $familiaridade->ID) ? 'selected' : ''}} >{{$familiaridade->FAMILIARIDADE}}</option>
                                    @endforeach
                                </select>                                       
                            </div>
                            <div class="col">
                                <label for="">Familiaridade Outros</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoPrestado->OUTROS_FAMILIARIDADE}}" disabled><br>                                       
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Tipo paciente</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoPrestado->TIPO}}" disabled><br>     
                            </div>
                            <div class="col">
                                <label for="">Localização do paciente</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoPrestado->LOCALIZACAO}}" disabled><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">CEP</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoPrestado->CEP}}" disabled><br>     
                            </div>
                            <div class="col">
                                <label for="">Endereço</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoPrestado->ENDERECO}}" disabled><br> 
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Bairro</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoPrestado->BAIRRO}}" disabled><br>       
                            </div>
                            <div class="col">
                                <label for="">Número</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoPrestado->NUMERO}}" disabled><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Cidade</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoPrestado->CIDADE}}" disabled><br>     
                            </div>
                            <div class="col">
                                <label for="">Estado</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoPrestado->UF}}" disabled><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Serviços a serem realizados</label><br>
                                @foreach($servicos as $servico)
                                    <input type="checkbox" name="servicos[]" id="servicos[]" value="{{$servico->ID}}"> {{$servico->TIPO}}<br> 
                                @endforeach  
                            </div>
                            <div class="col">
                                <label for="">Serviços outros</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoPrestado->SERVICOS_OUTROS}}" disabled><br>      
                            </div>
                        </div>
                        <br>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Toma medicamentos?</label><br>
                                <input type="radio" name="tomaMedicamento" id="tomaMedicamento" value="1" {{($servicoPrestado->TOMA_MEDICAMENTOS == 1) ? 'checked' : ''}}> Sim <br> 
                                <input type="radio" name="tomaMedicamento" id="tomaMedicamento"value="0" {{($servicoPrestado->TOMA_MEDICAMENTOS == 0) ? 'checked' : ''}}> Não    
                            </div>
                            <div class="col">
                                <label for="">Tipo medicamentos</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoPrestado->TIPO_MEDICAMENTOS}}" disabled><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Data serviço</label><br>  
                                <input class="form-control"type="text" name="" id="" value="{{$servicoPrestado->DATA_SERVICO}}" disabled><br>      
                            </div>
                            <div class="col">
                                <label for="">Valor</label><br>  
                                <input class="form-control"type="text" name="" id="" value="R${{$servicoPrestado->VALOR}}" disabled><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Hora de início</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoPrestado->HORA_INICIO}}" disabled><br>      
                            </div>
                            <div class="col">
                                <label for="">Hora de fim</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoPrestado->HORA_FIM}}" disabled><br>      
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection