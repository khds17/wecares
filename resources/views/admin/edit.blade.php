@extends('templates.template-admin')
@section('content')
    <h1 class="text-center">Editar</h1>
    <div class="col-8 m-auto">
        <form name="formEdit" id="formEdit" method="post" enctype="multipart/form-data" action="{{url("admin/$admin->ID")}}">
            @method('PUT')      
            @csrf
            <input class="form-control"type="text" name="nome" id="nome" placeholder="Nome:" value="{{$admin->NOME ?? ''}}">
            <input class="form-control"type="email" name="email" id="email" placeholder="E-mail:" value="{{$admin->EMAIL ?? ''}}">
            <input class="form-control"type="password" name="senha" id="senha" placeholder="Senha:" value="{{$admin->SENHA ?? ''}}">
            <br>
            <input class="btn btn-primary" type="submit" value="Salvar edição">
         </form>
    </div>
@endsection