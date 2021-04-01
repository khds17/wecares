@extends('templates.template-admin')
@section('content')
    <h1 class="text-center">Informações do prestadores</h1>
    <div class="col-8 m-auto">
        Nome:{{$prestadores->NOME}}<br>
        CPF:{{$prestadores->CPF}}<br>
        Telefone:{{$prestadores->TELEFONE}}<br>
        Data de Nascimento:{{$prestadores->DT_NASCIMENTO}}<br>
        E-mail:{{$prestadores->EMAIL}}<br>
        CEP:{{$endereco->CEP}}<br>
        Endereço:{{$endereco->ENDERECO}}<br>
        Número:{{$endereco->NUMERO}}<br>
        Bairro:{{$endereco->BAIRRO}}<br>
        Cidade:{{$cidade->CIDADE}}<br>
        Estado:{{$cidade->UF}}<br>
        @if ($certificado->CERTIFICADO)
            Certificado:<a href="{{url("storage/{$certificado->CERTIFICADO}")}}" target="_blank">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-medical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 1h5v1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6h1v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2z"/>
                    <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 0 1 9 4.5z"/>
                    <path fill-rule="evenodd" d="M7 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L8 6l.549.317a.5.5 0 1 1-.5.866L7.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L6 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 7 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </a>
        @endif
        <br>
        @if ($antecedente->ANTECEDENTE)
            Antedecentes:<a href="{{url("storage/{$antecedente->ANTECEDENTE}")}}" target="_blank">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-medical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 1h5v1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6h1v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2z"/>
                    <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 0 1 9 4.5z"/>
                    <path fill-rule="evenodd" d="M7 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L8 6l.549.317a.5.5 0 1 1-.5.866L7.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L6 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 7 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </a>
        @endif
        <br><br>
        <a href="">
            <button class="btn btn-success" onclick="aprovarPrestador({{$prestadores->ID_USUARIO}})">Aprovar</button>
        </a>
        <a href="">
            <button class="btn btn-danger" onclick="reprovarPrestador({{$prestadores->ID_USUARIO}})">Reprovar</button>
        </a>
    </div>
@endsection