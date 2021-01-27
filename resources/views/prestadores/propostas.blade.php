@extends('templates.template-admin')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary padding-top-15">Propostas pendentes</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-bordered">
                    @if (!empty($propostas))
                    {{-- @dd($propostas); --}}
                        <thead>
                            <tr>
                                <th scope="col">Nome do solicitante</th>
                                <th scope="col">Nome do paciente</th>
                                <th scope="col">Cidade</th>
                                <th scope="col">Valor</th>
                            </tr>
                        </thead>
                    @else
                        <thead>
                            Não há propostas disponíveis no momento
                        </thead>
                    @endif
                    <tbody>                       
                        @foreach($propostas as $proposta) 
                                <tr>
                                    <th scope="row">{{$proposta->NOME_SOLICITANTE}}</th>
                                    <td>{{$proposta->NOME_PACIENTE}}</td>
                                    <td>{{$proposta->CIDADE}}</td>
                                    <td>R${{$proposta->VALOR}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modalVisualizarProposta" href="">
                                            <button class="btn btn-primary">Visualizar</button>
                                        </a>
                                        <a href="">
                                            <button class="btn btn-success" onclick="aceitarProspostaPrestador({{$proposta->ID}})">Aceitar</button>
                                        </a>
                                        <a href="">
                                            <button class="btn btn-danger" onclick="recusarProspostaPrestador({{$proposta->ID}})">Recusar</button>
                                        </a>
                                    </td>     
                                <tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal cadastro -->
<div class="modal fade bd-example-modal-lg" id="modalVisualizarProposta" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal">Informações proposta </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (!empty($proposta))
                    <form name="formExibicaoPropostas" id="formExibicaoPropostas" method="post" action="">
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Nome do solicitante</label>
                                <input class="form-control"type="text" name="" id="" value="{{$proposta->NOME_SOLICITANTE}}" disabled><br>                                         
                            </div>
                            <div class="col">
                                <label for="">Nome do paciente</label>
                                <input class="form-control"type="text" name="" id="" value="{{$proposta->NOME_PACIENTE}}" disabled><br>                                       
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Familiaridade do solicitante</label>
                                <select name="familiaridade" class="custom-select" value="{{old('familiaridade')}}" disabled>
                                    @foreach($familiaridades as $familiaridade)
                                        <option value="{{$familiaridade->ID}}" {{($proposta->ID_FAMILIARIDADE == $familiaridade->ID) ? 'selected' : ''}} >{{$familiaridade->FAMILIARIDADE}}</option>
                                    @endforeach
                                </select>                                       
                            </div>
                            <div class="col">
                                <label for="">Familiaridade Outros</label>
                                <input class="form-control"type="text" name="" id="" value="{{$proposta->OUTROS_FAMILIARIDADE}}" disabled><br>                                       
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Tipo paciente</label>
                                <input class="form-control"type="text" name="" id="" value="{{$proposta->TIPO}}" disabled><br>     
                            </div>
                            <div class="col">
                                <label for="">Localização do paciente</label>
                                <input class="form-control"type="text" name="" id="" value="{{$proposta->LOCALIZACAO}}" disabled><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">CEP</label>
                                <input class="form-control"type="text" name="" id="" value="{{$proposta->CEP}}" disabled><br>     
                            </div>
                            <div class="col">
                                <label for="">Endereço</label>
                                <input class="form-control"type="text" name="" id="" value="{{$proposta->ENDERECO}}" disabled><br> 
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Bairro</label>
                                <input class="form-control"type="text" name="" id="" value="{{$proposta->BAIRRO}}" disabled><br>       
                            </div>
                            <div class="col">
                                <label for="">Número</label>
                                <input class="form-control"type="text" name="" id="" value="{{$proposta->NUMERO}}" disabled><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Cidade</label>
                                <input class="form-control"type="text" name="" id="" value="{{$proposta->CIDADE}}" disabled><br>     
                            </div>
                            <div class="col">
                                <label for="">Estado</label>
                                <input class="form-control"type="text" name="" id="" value="{{$proposta->UF}}" disabled><br>      
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
                                <input class="form-control"type="text" name="" id="" value="{{$proposta->SERVICOS_OUTROS}}" disabled><br>      
                            </div>
                        </div>
                        <br>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Toma medicamentos?</label><br>
                                <input type="radio" name="tomaMedicamento" id="tomaMedicamento" value="1" {{($proposta->TOMA_MEDICAMENTOS == 1) ? 'checked' : ''}}> Sim <br> 
                                <input type="radio" name="tomaMedicamento" id="tomaMedicamento"value="0" {{($proposta->TOMA_MEDICAMENTOS == 0) ? 'checked' : ''}}> Não    
                            </div>
                            <div class="col">
                                <label for="">Tipo medicamentos</label>
                                <input class="form-control"type="text" name="" id="" value="{{$proposta->TIPO_MEDICAMENTOS}}" disabled><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Data serviço</label><br>  
                                <input class="form-control"type="text" name="" id="" value="{{$proposta->DATA_SERVICO}}" disabled><br>      
                            </div>
                            <div class="col">
                                <label for="">Valor</label><br>  
                                <input class="form-control"type="text" name="" id="" value="R${{$proposta->VALOR}}" disabled><br>      
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Hora de início</label>
                                <input class="form-control"type="text" name="" id="" value="{{$proposta->HORA_INICIO}}" disabled><br>      
                            </div>
                            <div class="col">
                                <label for="">Hora de fim</label>
                                <input class="form-control"type="text" name="" id="" value="{{$proposta->HORA_FIM}}" disabled><br>      
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Fim modal cadastro -->
@endsection