@extends('templates.template')

@section('content')
    <h1 class="text-center">Informações do solicitante</h1>
    <div class="col-8 m-auto">
        {{$solicitante}}
    </div>
@endsection