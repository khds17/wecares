@extends('templates.template')
@section('content')
<header class="page-header page-header-dark bg-img-cover overlay overlay-secondary overlay-90" style='background-image: url("https://drive.google.com/file/d/1EkJcyR65gl8FvOZAIX15s4i00kXKp_4w/view?usp=sharing")'>
    <div class="page-header-content py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 text-center">
                    <h1 class="page-header-title">Cuidadores encontrados</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row features text-center mb-10">
                <div class="col-lg-4 col-md-6 mb-5">
                    <a class="card card-link border-top border-top-lg border-primary h-100 lift" href="{{url("/perfil")}}">
                        <div class="card-body p-5">
                            <div class="icon-stack icon-stack-lg bg-primary-soft text-primary mb-4"><i data-feather="user"></i></div>
                            <h6>Nome</h6>
                            <div class="small text-gray-500 text-left">Quantidade de serviço prestado:</div>
                            <div class="small text-gray-500 text-left">Profissão:</div>
                            <div class="small text-gray-500 text-left">Distância:</div>
                            <div class="small text-gray-500 text-left">Avaliação</div>                            
                        </div>
                        <div class="card-footer bg-transparent border-top d-flex align-items-center justify-content-center">
                            <div class="small text-primary">Veja o perfil</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="svg-border-rounded text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
        </div>
    </div>
</header>
@endsection