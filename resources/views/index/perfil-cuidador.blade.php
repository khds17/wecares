@extends('templates.template')

@section('content')
<header class="page-header page-header-dark bg-img-cover overlay overlay-secondary overlay-90">
    <div class="page-header-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 text-center">
                    <img class="mb-4" src="assets/layout/img/avataaars.svg" style="width: 15rem;" />
                        <h1 class="page-header-title">Bem vindo ao perfil de X!</h1>
                        <p class="page-header-text">Veja abaixo mais informações detalhadas sobre X</p>
                </div>
            </div>
        </div>
    </div>
    <div class="svg-border-rounded text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
    </div>
</header>
<section class="bg-white py-10">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="icon-stack icon-stack-xl bg-red text-white mb-4"><i data-feather="edit-3"></i></div>
                <h3>Illustration</h3>
                <p class="mb-0">I provide custom illustration services for contract clients</p>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="icon-stack icon-stack-xl bg-yellow text-white mb-4"><i data-feather="layout"></i></div>
                <h3>UI Design</h3>
                <p class="mb-0">User experience and interface designs is one of my specialties</p>
            </div>
            <div class="col-lg-4">
                <div class="icon-stack icon-stack-xl bg-blue text-white mb-4"><i data-feather="droplet"></i></div>
                <h3>Graphic Design</h3>
                <p class="mb-0">Photo restoration, post processing, and other photo services</p>
            </div>
        </div>
    </div>
    <div class="svg-border-rounded text-light">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
    </div>
</section>
<section class="bg-light py-10">
    <div class="container">
        <div class="card-columns card-columns-portfolio">
            <a class="card card-link border-top border-top-lg border-primary h-100 lift" href="{{url("/perfil")}}">
                <div class="card-body p-5">
                    <h6>X avaliou:</h6>
                    <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos.</p>  
                    <p>Avalição</p>                     
                </div>
            </a>
        </div>
    </div>
    <div class="svg-border-rounded text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
    </div>
</section>
<div style="position: fixed; bottom: 35px; width: 90%; height: 100px;">
    <div class="float-right">
        <a class="btn-cyan btn rounded-pill px-4 ml-lg-4">Contratar</a>
    </div>
</div>

@endsection