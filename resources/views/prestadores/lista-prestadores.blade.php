@extends('templates.template-admin')
@section('content')
        <div id="content">
            <div class="container-fluid">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Listagem de prestadores</h6>
                    </div>
                    <div class="card-body">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($prestadores as $prestador)
                                    <tr>
                                        <!-- Aqui nesse trecho tem que colocar o campo igual esta na tabela, no nosso caso Maiusculo -->
                                        <th scope="row">{{$prestador->ID}}</th>
                                        <td>{{$prestador->NOME}}</td>
                                        <td>{{$prestador->EMAIL}}</td>
                                        <td>{{$prestador->STATUS}}</td>
                                        <td>
                                            <a href="{{url("prestador/$prestador->ID")}}" target="_blank">
                                                <button class="btn btn-primary">Ver cadastro</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </body>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection