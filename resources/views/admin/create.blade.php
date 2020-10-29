@extends('templates.template-admin')
@section('content')
    <h1 class="text-center">@if(isset($edit)) Editar @else Cadastrar @endif</h1>
    <div class="col-8 m-auto">

        @if(isset($edit))
        <form name="formEdit" id="formEdit" method="post" action="{{url("admin/$edit->ID")}}">
            @method('PUT') 
        @else
        <form name="formAdmin" id="formAdmin" method="post" action="{{url('admin')}}"> 
        @endif        
            @csrf
            <input class="form-control"type="text" name="nome" id="nome" placeholder="Nome:" value="{{$edit->NOME ?? ''}}">
            <input class="form-control"type="email" name="email" id="email" placeholder="E-mail:" value="{{$edit->EMAIL ?? ''}}">
            <input class="form-control"type="password" name="senha" id="senha" placeholder="Senha:" value="{{$edit->SENHA ?? ''}}">
            <br>
            <input class="btn btn-primary" type="submit" value="@if(isset($edit)) Salvar edição @else Cadastrar @endif">
         </form>
    </div>
@endsection