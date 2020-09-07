@extends('templates.template')
@section('content')
    <h1 class="text-center">@if(isset($edit)) Editar @else Cadastrar @endif</h1>
    <div class="col-8 m-auto">

        @if(isset($edit))
        <form name="formEdit" id="formEdit" method="post" action="{{url("solicitante/$edit->id")}}">
            @method('PUT') 
        @else
        <form name="formSolictante" id="formSolictante" method="post" action="{{url('solicitante')}}"> 
        @endif        
            @csrf
            <input class="form-control"type="text" name="nome" id="nome" placeholder="Nome:" value="{{$edit->nome ?? ''}}">
            <input class="form-control"type="email" name="email" id="email" placeholder="E-mail:" value="{{$edit->email ?? ''}}">
            <input class="form-control"type="text" name="cep" id="cep" placeholder="CEP:" value="{{$edit->cep ?? ''}}"> 
            <input class="form-control"type="text" name="endereco" id="endereco" placeholder="Endereço:" value="{{$edit->endereco ?? ''}}">
            <input class="form-control"type="text" name="numero" id="numero" placeholder="Número:" value="{{$edit->numero ?? ''}}">
            <input class="form-control"type="text" name="cidade" id="cidade" placeholder="Cidade:" value="{{$edit->cidade ?? ''}}">
            <input class="form-control"type="text" name="bairro" id="bairro" placeholder="Bairro:" value="{{$edit->bairro ?? ''}}" >
            <input class="form-control"type="text" name="complemento" id="complemento" placeholder="Complemento:" value="{{$edit->complemento ?? ''}}">
            <input class="form-control"type="text" name="estado" id="estado" placeholder="UF:" value="{{$edit->estado ?? ''}}">
            <input class="form-control"type="text" name="nivelfamiliaridade" id="nivelfamiliaridade" placeholder="Nivel familiaridade:" value="{{$edit->nivelfamiliaridade ?? ''}}">
            <input class="form-control"type="text" name="nivelfamiliaridadeoutros" id="nivelfamiliaridadeoutros" placeholder="Nivel familiaridade outros:" value="{{$edit->nivelfamiliaridadeoutros ?? ''}}">
            <input class="form-control"type="text" name="status" id="status" placeholder="Status:" value="{{$edit->status ?? ''}}">
            <br>
            <input class="btn btn-primary" type="submit" value="@if(isset($edit)) Salvar edição @else Cadastrar @endif">
         </form>
    </div>
@endsection