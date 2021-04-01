@extends('templates.template-admin')
@section('content')
    <h1 class="text-center">Informações do prestador</h1>
    <form action="">
        <div class="card-body">
            <div class="row margin-top-10">
                <div class="col">
                    <label for="nome">Nome completo</label>
                    <input class="form-control" type="text" name="prestadorNome" id="prestadorNome" value="{{$prestador->NOME}}" disabled>
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="cpf">CPF</label>
                    <input class="form-control" type="text" name="prestadorCPF" id="prestadorCPF" value="{{$prestador->CPF}}" disabled>
                </div>
                <div class="col">
                    <label for="telefone">Número celular</label>
                    <input class="form-control" type="text" name="prestadorTelefone" id="prestadorTelefone" value="{{$prestador->TELEFONE}}" disabled>
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="font-color-gray col">
                    <label for="nascimento">Data de nascimento</label>
                    <input class="form-control" type="date" name="prestadorNascimento" id="prestadorNascimento" value="{{$prestador->DT_NASCIMENTO}}" disabled>
                </div>
                <div class="font-color-gray col">
                    <label for="sexo">Sexo</label> &nbsp;&nbsp; <br>
                    @foreach($sexos as $sexo)
                        <input type="radio" name="sexo" id="sexo" value="{{$sexo->ID}}" {{($sexo->ID == $prestador->ID_SEXO) ? 'checked' : ''}} disabled> {{$sexo->SEXO}} <br>
                    @endforeach
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="email" name="prestadorEmail" id="prestadorEmail" value="{{$prestador->EMAIL}}" disabled>
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="cep">CEP</label>
                    <input class="form-control" type="text" name="prestadorCep" id="prestadorCep" value="{{$endereco->CEP}}" disabled>
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="endereco">Endereço</label>
                    <input class="form-control" type="text" name="prestadorEndereco" id="prestadorEndereco" value="{{$endereco->ENDERECO}}" disabled>
                </div>
                <div class="col">
                    <label for="numero">Número</label>
                    <input class="form-control" type="text" name="prestadorNumero" id="prestadorNumero" value="{{$endereco->NUMERO}}" disabled>
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="cidade">Cidade</label>
                    <select class ="form-control" name="prestadorCidade" id="prestadorCidade" value="" disabled>
                        @foreach($cidades as $cidade)
                            <option value="{{$cidade->ID}}" {{($prestador->ID_ENDERECO == $endereco->ID && $cidade->ID == $endereco->ID_CIDADE) ? 'selected' : ''}}>{{$cidade->CIDADE}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="bairro">Bairro</label>
                    <input class="form-control" type="text" name="prestadorBairro" id="prestadorBairro" value="{{$endereco->BAIRRO}}">
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col">
                    <label for="estado">Estado</label>
                    <select class ="form-control"name="prestadorEstado" id="prestadorEstado" disabled>
                        @foreach($estados as $estado)
                            <option value="{{$estado->ID}}" {{($prestador->ID_ENDERECO == $endereco->ID && $estado->ID == $endereco->ID_ESTADO) ? 'selected' : ''}}>{{$estado->UF}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="complemento">Complemento</label>
                    <input class="form-control" type="text" name="prestadorComplemento" id="prestadorComplemento" value="{{$endereco->COMPLEMENTO}}" disabled>
                </div>
            </div>
            <br>
            <div class="row margin-top-10">
                <div class="col font-color-gray">
                    <label for="formacao">Formação</label><br>
                    @foreach($formacoes as $formacao)
                        <input type="radio" name="formacao" id="formacao" value="{{$formacao->ID}}" {{($formacao->ID === $prestador->ID_FORMACAO) ? 'checked' : ''}} disabled> {{$formacao->FORMACAO}} <br>
                    @endforeach
                </div>
                <br>
                <div class="col font-color-gray">
                    <label for="certificado">Certificado</label>
                    <a href="{{url("storage/{$certificado->CERTIFICADO}")}}" target="_blank">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-medical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 1h5v1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6h1v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2z"/>
                            <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 0 1 9 4.5z"/>
                            <path fill-rule="evenodd" d="M7 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L8 6l.549.317a.5.5 0 1 1-.5.866L7.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L6 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 7 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </a>
                </div>
                <br>
                <div class="col font-color-gray">
                    <label for="antecedentes">Antecedentes criminais</label>
                    <a href="{{url("storage/{$antecedente->ANTECEDENTE}")}}" target="_blank">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-medical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 1h5v1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6h1v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2z"/>
                            <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 0 1 9 4.5z"/>
                            <path fill-rule="evenodd" d="M7 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L8 6l.549.317a.5.5 0 1 1-.5.866L7.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L6 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 7 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </a>
                </div>
                <br>
                <div class="col font-color-gray">
                    <label for="foto">Foto de perfil</label>
                    <a href="{{url("storage/{$foto->FOTO}")}}" target="_blank">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-medical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 1h5v1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6h1v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2z"/>
                            <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 0 1 9 4.5z"/>
                            <path fill-rule="evenodd" d="M7 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L8 6l.549.317a.5.5 0 1 1-.5.866L7.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L6 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 7 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <br>
            <button class="btn btn-success" onclick="aprovarPrestador({{$prestador->ID_USUARIO}})">Aprovar</button>
            <button class="btn btn-danger" onclick="reprovarPrestador({{$prestador->ID_USUARIO}})">Reprovar</button>
        </div>
    </form>
@endsection