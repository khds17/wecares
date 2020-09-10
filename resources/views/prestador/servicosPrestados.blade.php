@extends('templates.template-admin')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary padding-top-15">Serviços prestados</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nome do solicitante</th>
                            <th scope="col">Data do serviço</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Avaliação do solicitante</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Kauan Henrique</th>
                            <td>21/10/2019</td>
                            <td>R$50,00</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados cadastrais </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
@endsection