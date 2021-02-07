@extends('templates.template-admin')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary padding-top-15">Dados cadastrais</h6>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-success" href="{{url("paciente/create")}}"> Cadastrar</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo paciente</th>
                            <th scope="col">Hospedado em</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pacientes as $paciente)
                                <tr>
                                    <th scope="row">{{$paciente->NOME}}</th>
                                    <td>{{$paciente->TIPO}}</td>
                                    <td>{{$paciente->LOCALIZACAO}}</td>
                                    <td>                
                                        <a class="btn btn-primary" href="{{"paciente/$paciente->ID/edit"}}" target="_blank"> Editar </a>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection