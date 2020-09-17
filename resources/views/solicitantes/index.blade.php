@extends('templates.template-admin')

@section('content')
        <div id="content">
            <div class="container-fluid">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Solicitante</h6>
                        <a href="{{url("solicitante/create")}}">
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
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($solicitante as $solicitantes)
                                    <tr>
                                        <th scope="row">{{$solicitantes->id}}</th>
                                        <td>{{$solicitantes->nome}}</td>
                                        <td>{{$solicitantes->email}}</td>
                                        <td>{{$solicitantes->status}}</td>
                                        <td>
                                            <a href="{{url("solicitante/$solicitantes->id")}}">
                                                <button class="btn btn-dark">Visualizar</button>
                                            </a>
                                            <a href="{{url("solicitante/$solicitantes->id/edit")}}">
                                                <button class="btn btn-primary">Editar</button>
                                            </a>
                                            <a href="{{url("solicitante/$solicitantes->id/")}}" class="js-del">
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