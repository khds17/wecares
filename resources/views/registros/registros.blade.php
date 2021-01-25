@extends('templates.template-admin')
@section('content')
<table class="table-register">
    <thead>
        <tr>
            <th> 
                Data
            </th>
            <th>
                Descrição
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($registros as $registro)
        <tr>
            <td>
                {{$registro->DATA}}
            </td>
            <td>
                {{$registro->TEXTO}}
            </td>
        @endforeach
        </tr>
    </tbody>
</table>
@endsection