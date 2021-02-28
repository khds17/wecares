@extends('templates.template-admin')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary padding-top-15">Serviços contratados</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nome do prestador</th>
                            <th scope="col">Data do serviço</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Status</th>
                            <th scope="col">Pagamento </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicosContratados as $servicoContrado)
                        <tr>
                            <th scope="row">{{$servicoContrado->NOME_PRESTADOR}}</th>
                            <td>{{$servicoContrado->DATA_SERVICO}}</td>
                            <td>R${{$servicoContrado->VALOR}}</td>

                            @if ($servicoContrado->STATUS_SERVICO === 3)
                                <td>Pendente</td>
                            @elseif ($servicoContrado->STATUS_SERVICO === 4)
                                <td>Aprovado</td>
                            @elseif ($servicoContrado->STATUS_SERVICO === 5)
                                <td>Cancelado</td>
                            @endif

                            @if ($servicoContrado->STATUS_APROVACAO == '' || $servicoContrado->STATUS_APROVACAO == null)
                                <td>Pendente</td>
                            @elseif ($servicoContrado->STATUS_APROVACAO == 'approved')
                                <td>Aprovado</td>
                            @elseif ($servicoContrado->STATUS_APROVACAO === 'refunded')
                                <td>Cancelado</td>
                            @endif
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
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modalVisualizarServico" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal">Informações do serviço </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (!empty($servicoContrado))
                    <form name="formExibicaoServico" id="formExibicaoServico" method="post" action="">
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Nome do profissional</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->NOME_PRESTADOR}}" disabled><br>                                       
                            </div>
                            <div class="col">
                                <label for="">Formação</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->FORMACAO}}" disabled><br>     
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Telefone para contato</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->TELEFONE}}" disabled><br>                                       
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Nome do paciente</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->NOME_PACIENTE}}" disabled><br>                                       
                            </div>
                            <div class="col">
                                <label for="">Tipo paciente</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->TIPO}}" disabled><br>     
                            </div>
                        </div>
                        <div class="row margin-top-10">
                             <div class="col">
                                <label for="">Localização do paciente</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->LOCALIZACAO}}" disabled><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">CEP</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->CEP}}" disabled><br>     
                            </div>
                            <div class="col">
                                <label for="">Endereço</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->ENDERECO}}" disabled><br> 
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Bairro</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->BAIRRO}}" disabled><br>       
                            </div>
                            <div class="col">
                                <label for="">Número</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->NUMERO}}" disabled><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Cidade</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->CIDADE}}" disabled><br>     
                            </div>
                            <div class="col">
                                <label for="">Estado</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->UF}}" disabled><br>      
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
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->SERVICOS_OUTROS}}" disabled><br>      
                            </div>
                        </div>
                        <br>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Toma medicamentos?</label><br>
                                <input type="radio" name="tomaMedicamento" id="tomaMedicamento" value="1" {{($servicoContrado->TOMA_MEDICAMENTOS == 1) ? 'checked' : ''}}> Sim <br> 
                                <input type="radio" name="tomaMedicamento" id="tomaMedicamento"value="0" {{($servicoContrado->TOMA_MEDICAMENTOS == 0) ? 'checked' : ''}}> Não    
                            </div>
                            <div class="col">
                                <label for="">Tipo medicamentos</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->TIPO_MEDICAMENTOS}}" disabled><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Data serviço</label><br>  
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->DATA_SERVICO}}" disabled><br>      
                            </div>
                            <div class="col">
                                <label for="">Valor</label><br>  
                                <input class="form-control"type="text" name="" id="" value="R${{$servicoContrado->VALOR}}" disabled><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Hora de início</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->HORA_INICIO}}" disabled><br>      
                            </div>
                            <div class="col">
                                <label for="">Hora de fim</label>
                                <input class="form-control"type="text" name="" id="" value="{{$servicoContrado->HORA_FIM}}" disabled><br>      
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection