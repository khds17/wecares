@extends('templates.template-admin')

@section('content')
    <h1 class="text-center">Solicitante</h1>
    <div class="text-center mt-3 mb-4">
        <a href="{{url("solicitante/create")}}">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>
    <div class="col-8 m-auto">
            @csrf
            <table class="table text-center">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($solicitante as $solicitantes)
            <tr>
                <th scope="row">{{$solicitantes->id}}</th>
                <td>{{$solicitantes->nome}}</td>
                <td>{{$solicitantes->email}}</td>
                <td>{{$solicitantes->status}}</td>
                <td>
                    <a href="{{url("solicitante/$solicitantes->id")}}">
                        <button class="btn btn-dark">Visualizar</button>
                    </a>
                    <a href="{{url("solicitante/$solicitantes->id/edit")}}">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href="{{url("solicitante/$solicitantes->id/")}}" class="js-del">
                        <button class="btn btn-danger">Deletar</button>
                    </a>
            </tr>
        @endforeach
        </tbody>
            </table>    
    </div>
@endsection