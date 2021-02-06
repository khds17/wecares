@extends('templates.template-admin')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary padding-top-15">Conta bancária</h6>
                    </div>
                    <div class="col-md-6 text-right">
                    <a class="btn btn-success" href="{{url('recebimentos/create')}}"> Cadastrar </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Banco</th>
                            <th scope="col">Agência</th>
                            <th scope="col">Conta</th>
                            <th scope="col">Tipo</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contasRecebimento as $contaRecebimento)	                      
                            <tr>	                            
                                <th scope="row">{{$contaRecebimento->BANCO}}</th>	                          
                                <td>{{$contaRecebimento->AGENCIA}}</td>	              
                                <td>{{$contaRecebimento->CONTA}}</td>
                                <td>	                            
                                    @if($contaRecebimento->TIPO_CONTA === 1)
                                        Conta corrente	
                                    @elseif($contaRecebimento->TIPO_CONTA === 2)	
                                        Conta poupança	
                                    @else	
                                        Conta salário	
                                    @endif	
                                </td>	
                                <td>
                                    <a class="btn btn-primary" href=""> Editar </a>
                                </td>	
                            </tr>	
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- DataTales Example -->
        {{-- <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary padding-top-15">Recibos</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Solicitante</th>
                            <th scope="col">Data do serviço</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Comprovante</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <th scope="row">Kauan Henrique</th>
                            <td>21/10/2019</td>
                            <td>R$50,00</td>
                            <td><img src="https://img.icons8.com/color/25/000000/pdf.png"/></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> --}}
    </div>
</div>
@endsection