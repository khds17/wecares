@extends('templates.template-admin')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary padding-top-15">Dados cadastrais</h6>
                    </div>  
                    <div class="col-md-6 text-right ">
                        @foreach($arrayAdmin as $admin) 
                            <a class="btn btn-primary" href="{{"admin/$admin->ID/edit"}}"> Editar </a>
                        @endforeach
                    </div>
                </div>                    
            </div>
            <div class="card-body">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($arrayAdmin as $admin)
                            <tr>
                                <!-- Aqui nesse trecho tem que colocar o campo igual esta na tabela, no nosso caso Maiusculo -->
                                <th scope="row">{{$admin->ID}}</th>
                                <td>{{$admin->NOME}}</td>
                                <td>{{$admin->EMAIL}}</td>
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