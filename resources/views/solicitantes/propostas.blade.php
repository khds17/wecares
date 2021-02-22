@extends('templates.template-admin')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary padding-top-15">Propostas</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-bordered">
                    @if (!empty($propostas))
                        <thead>
                            <tr>
                                {{-- <th scope="col">Número da proposta</th> --}}
                                <th scope="col">Nome do profissional</th>
                                <th scope="col">Paciente</th>
                                <th scope="col">Valor</th>
                            </tr>
                        </thead>
                    @else
                        <thead>
                            Não há propostas disponíveis no momento
                        </thead>
                    @endif
                    <tbody>         
                        {{-- Só crio esse foreach para percorrer e jogar os valores dentro do td do foreach de baixo --}}           
                        @foreach($propostas as $proposta) 
                                <tr>
                                    {{-- <th scope="row">{{$proposta->ID}}</th> --}}
                                    <td>{{$proposta->NOME_PRESTADOR}}</td>
                                    <td>{{$proposta->NOME_PACIENTE}}</td>
                                    <td>R${{$proposta->VALOR}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modalVisualizarProposta" href="">
                                            <button class="btn btn-primary" onclick="getProposta({{$proposta->ID}})">Visualizar</button>
                                        </a>
                                        <a href="">
                                            <button class="btn btn-success" onclick="aceitarPropostaSolicitante({{$proposta->ID}})">Aceitar</button>
                                        </a>
                                        <a href="">
                                            <button class="btn btn-danger" onclick="recusarProspostaSolicitante({{$proposta->ID}})">Recusar</button>
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
                                <label for="">Nome do profissional</label>
                                <input class="form-control"type="text" name="prestadorNome" id="prestadorNome" value=""><br>                                       
                            </div>
                            <div class="col">
                                <label for="">Formação</label>
                                <input class="form-control"type="text" name="formacao" id="formacao" value=""><br>     
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Telefone para contato</label>
                                <input class="form-control"type="text" name="prestadorTelefone" id="prestadorTelefone" value=""><br>                                       
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="col">
                                <label for="">Nome do paciente</label>
                                <input class="form-control"type="text" name="pacienteNome" id="pacienteNome" value=""><br>                                       
                            </div>
                            <div class="col">
                                <label for="">Tipo paciente</label>
                                <input class="form-control"type="text" name="pacienteTipo" id="pacienteTipo" value=""><br>     
                            </div>
                        </div>
                        <div class="row margin-top-10">
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