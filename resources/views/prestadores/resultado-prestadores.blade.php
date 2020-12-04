@extends('templates.template')
@section('content')
<header class="page-header page-header-dark bg-img-cover overlay overlay-secondary overlay-90" style='background-image: url("https://drive.google.com/file/d/1EkJcyR65gl8FvOZAIX15s4i00kXKp_4w/view?usp=sharing")'>
    <div class="page-header-content py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 text-center">
                    <h1 class="page-header-title">Cuidadores encontrados</h1>
                </div>
            </div>
        </div>
        <div class="container padding-top-50">
            <div class="row features text-center mb-10">
                <div class="col-lg-4 col-md-6 mb-5">
                    <a class="card card-link border-top border-top-lg border-primary h-100 lift" href="{{url("")}}">
                        <div class="card-body p-5">
                            <div class="icon-stack icon-stack-lg bg-primary-soft text-primary mb-4"><i data-feather="user"></i></div>
                            <h6>Nome</h6>
                            <div class="small text-gray-500 text-left">Quantidade de serviço prestado:</div>
                            <div class="small text-gray-500 text-left">Profissão:</div>
                            <div class="small text-gray-500 text-left">Distância:</div>
                            <div class="small text-gray-500 text-left">Avaliação</div>                            
                        </div>
                        <div class="card-footer bg-transparent border-top d-flex align-items-center justify-content-center">
                            <div class="small text-primary">Selecionar</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="svg-border-rounded text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
        </div>
    </div>
    <div style="position: fixed; bottom: 35px; width: 90%; height: 100px;">
        <div class="float-right">
            <a class="btn-cyan btn rounded-pill px-4 ml-lg-4" data-toggle= "modal" data-target="#modalServico">Solicitar serviço</a>
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
                <form class="user">
                    @csrf
                    <div class="form-group">
                        <label for="paciente" class="text-dark">Paciente</label><br>
                        <select name="select" class="custom-select">
                            <option value="valor1">Kauan Henrique</option> 
                        </select>                      
                    </div>
                    <div class="row margin-top-10">
                                <div class="col">
                                    <label for="paciente" class="text-dark">O paciente é?</label><br>
                                    <select name="select" class="custom-select">
                                            <option value="valor1">Ex: Bebê, adulto ou criança</option> 
                                            <option value="valor1">Bebê</option> 
                                            <option value="valor1">Criança</option> 
                                            <option value="valor1">Adolescente</option>
                                            <option value="valor1">Adulto</option>
                                            <option value="valor1">Idoso</option>
                                    </select>                                  
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <label for="paciente" class="text-dark">Onde o paciente está localizado?</label><br>
                                    <select name="select" class="custom-select">
                                        <option value="valor1">Casa de retiro</option> 
                                        <option value="valor1">Hospital</option> 
                                        <option value="valor1">Residência</option>
                                     </select>   
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="cep" id="cep" placeholder="CEP" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="endereco" id="endereco" placeholder="Endereço" required>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="numero" id="numero" placeholder="Número" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="cidade" id="cidade" placeholder="Cidade" required>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="bairro" id="bairro" placeholder="Bairro" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="text" name="complemento" id="complemento" placeholder="Complemento" required>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="estado" id="estado" placeholder="UF" required><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label for="formacao">Serviços que deverão ser realizados</label><br>
                                    @foreach($servicos as $servico)
                                        <input type="checkbox" name="servicos[]" id="servicos[]" value="{{$servico->ID}}"> {{$servico->TIPO}}<br> 
                                    @endforeach
                                    <input type="checkbox" name="outros" id="outros" value="sim"><input class="form-control" type="text" name="servicos[]" id="servicoOutros" placeholder="Outros"><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label for="formacao">Paciente toma medicamentos?</label><br>
                                    <input type="radio" name="formacao" id="formacao"> Sim <br> 
                                    <input type="radio" name="formacao" id="formacao"> Não
                                    <input class="form-control" type="text" name="medicamentos" id="medicamentos" placeholder="Quais?"><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label class ="" for="formacao">Data e hora do serviço:</label><br>
                                </div>
                            </div>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="date" name="dataservico" id="dataservico" placeholder="Data do serviço">
                                </div>
                            </div>
                            <br>
                            <div class="row margin-top-10">
                                <div class="col">
                                    <input class="form-control" type="datetime" name="horaservico" id="horaservico" placeholder="Horário de início ">
                                </div>
                                <div class="col">
                                    <input class="form-control" type="datetime" name="horaservico" id="horaservico" placeholder="Horário do fim">
                                </div>
                            </div>
                            <br>
                            <!-- <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label class ="" for="">Adicionar mais</label><br>        
                                </div>
                            </div>
                            <br> -->
                            <div class="row margin-top-10">
                                <div class="col font-color-gray">
                                    <label class ="" for="formacao">Valor total do serviço:</label><br>                                
                                </div>
                            </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Enviar proposta</button>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection