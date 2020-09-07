@extends('templates.template-admin')
@section('content')
        <div id="content">
            <div class="container-fluid">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Administradores</h6>
                        <a href="{{url("admin/create")}}">
                            <button class="btn btn-success">Cadastrar</button>
                        </a>
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
                                @foreach($admin as $admins)
                                    <tr>
                                        <!-- Aqui nesse trecho tem que colocar o campo igual esta na tabela, no nosso caso Maiusculo -->
                                        <th scope="row">{{$admins->ID}}</th>
                                        <td>{{$admins->NOME}}</td>
                                        <td>{{$admins->EMAIL}}</td>
                                        <td>{{$admins->STATUS}}</td>
                                        <td>
                                            <a href="{{url("admin/$admins->ID")}}">
                                                <button class="btn btn-dark">Visualizar</button>
                                            </a>
                                            <a href="{{url("admin/$admins->ID/edit")}}">
                                                <button class="btn btn-primary">Editar</button>
                                            </a>
                                            <a href="{{url("admin/$admins->ID/")}}" class="js-del">
                                                <button class="btn btn-danger">Deletar</button>
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