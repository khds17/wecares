@extends('templates.template-admin')
@section('content')
    <h1 class="text-center">Cadastrar</h1>
    <div class="col-8 m-auto">
        <form name="formAdmin" id="formAdmin" method="post" action="{{url('admin')}}">         
            @csrf
            <input class="form-control"type="text" name="nome" id="nome" placeholder="Nome:">
            <input class="form-control"type="email" name="email" id="email" placeholder="E-mail:">
            <input class="form-control"type="password" name="senha" id="senha" placeholder="Senha:">
            <br>
            <input class="btn btn-primary" type="submit" value="Cadastrar">
         </form>
    </div>
@endsection