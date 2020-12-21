@extends('templates.template-admin')
@section('content')
{{-- @dd($propostas) --}}
<div id="content">
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary padding-top-15">Propostas</h6>
                    </div>
                    <div class="col-md-6 text-right">
                        {{-- @foreach($propostas as $propostas) 
                            <a class="btn btn-primary" href="{{"prestador/$prestador->ID/edit"}}"> Editar </a>
                        @endforeach --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nome solicitante</th>
                            <th scope="col">Nome paciente</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>                       
                        @foreach($propostas as $proposta) 
                                <tr>
                                    <th scope="row">{{$proposta->NOME_SOLICITANTE}}</th>
                                    <td>{{$proposta->NOME_PACIENTE}}</td>
                                    <td>{{$proposta->CIDADE}}</td>
                                    <td>R${{$proposta->VALOR}}</td>
                                    <td>
                                        <a href="">
                                            <button class="btn btn-primary">Visualizar</button>
                                        </a>
                                        <a href="">
                                            <button class="btn btn-success">Aceitar</button>
                                        </a>
                                        <a href="">
                                            <button class="btn btn-danger">Recusar</button>
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
@endsection