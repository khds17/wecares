@extends('templates.template')
@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary">
    <div class="page-header-content py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 text-center">
                    @if (count($prestadores) >= 1)
                        <h1 class="page-header-title">Profissionais encontrados</h1>
                        <p class="page-header-text mb-7">Selecione um ou mais cuidadores para enviar uma proposta.</p>
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
                    <a class="card card-link border-top border-top-lg border-primary h-100 lift" onclick="checkPrestador({{$prestador->ID}})">
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
                <a class="btn-cyan btn rounded-pill px-4 ml-lg-4" onclick="enviarProposta()"> Solicitar contato</a>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="modalServico" tabindex="-1" role="dialog" aria-labelledby="modalServicoLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalServicoLabel">Informações do pedido</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="formProposta" id="formProposta" method="post" enctype="multipart/form-data" action="{{url('proposta')}}">
                                @csrf
                                <div class="row margin-top-10">
                                    <div class="col">
                                        <input type="hidden" id="idPrestadores" name="idPrestadores">
                                        <label for="paciente" class="text-dark">Nome do paciente</label><br>
                                        <input class="form-control" type="text" name="selectPaciente" id="selectPaciente">
                                        @error('selectPaciente')
                                            <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                    </div>
                                    <br>
                                </div>
                                <br>
                                <div class="row margin-top-10">
                                    <div class="col">
                                        <label for="paciente" class="text-dark">O paciente é?</label><br>
                                        <select name="pacienteTipo" id="pacienteTipo" class="custom-select">
                                            <option value="Bebê">Bebê</option>
                                            <option value="Criança">Criança</option>
                                            <option value="Adolescente">Adolescente</option>
                                            <option value="Adulto">Adulto</option>
                                            <option value="Idoso">Idoso</option>
                                        </select>
                                        @error('pacienteTipo')
                                            <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row margin-top-10">
                                    <div class="col">
                                        <label for="solicitante" class="text-dark">Nome do solicitante</label><br>
                                        <input class="form-control" type="text" name="firstname" id="firstname">
                                        @error('selectPaciente')
                                            <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="telefone" class="text-dark">Telefone para contato</label><br>
                                        <input class="form-control" type="text" name="phone" id="phone">
                                    </div>
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <input class="btn btn-teal btn-block btn-marketing rounded-pill" type="submit" value="Enviar">
                                </div>
                        </form>
                    </div>
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
