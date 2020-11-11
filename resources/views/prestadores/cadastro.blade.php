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
                        @foreach($prestadores as $prestador) 
                            <a class="btn btn-primary" href="{{"prestador/$prestador->ID/edit"}}"> Editar </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Especilidade</th>
                            <th scope="col">Telefone</th>
                        </tr>
                    </thead>
                    <tbody>                       
                        @foreach($prestadores as $prestador) 
                            @foreach ($formacoes as $formacao)
                                <tr>
                                <th scope="row">{{$prestador->NOME}}</th>
                                <td>{{$prestador->EMAIL}}</td>
                                <td>{{$formacao->FORMACAO}}</td>
                                <td>{{$prestador->TELEFONE}}</td>
                                </tr>
                                <tr>
                            @endforeach 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- <!-- Modal -->
<div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastroLabel">Dados cadastrais </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="formEditPrestador" id="formEditPrestador" method="post" enctype="multipart/form-data" action="{{url('prestador')}}">   
                    @foreach($prestadores as $prestador) 
                        @foreach ($formacoes as $formacao)
                        <input class="form-control" type="text" name="prestadorNome" id="prestadorNome" placeholder="Nome completo" value="{{old('prestadorNome')}}">
                        @error('prestadorNome')
                            <span class="text-danger"><small>{{$message}}</small></span>
                        @enderror
                    </div>
                        <tr>
                        <th scope="row"></th>
                        <td>{{$prestador->EMAIL}}</td>
                        <td>{{$formacao->FORMACAO}}</td>
                        <td>{{$prestador->TELEFONE}}</td>
                        </tr>
                        <tr>
                        @endforeach 
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</div> --}}
@endsection