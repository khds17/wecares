@extends('templates.template')
@section('content')
    <div id="layoutDefault">
            <div id="layoutDefault_content">
                <main>
                        <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
                            <div class="page-header-content">
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6" data-aos="fade-up">
                                            <h1 class="page-header-title text-center">Conectamos pessoas que desejam encontrar cuidadores profissionais</h1>
                                            <!-- <p class="page-header-text mb-5">Welcome to SB UI Kit Pro, a toolkit for building beautiful web interfaces, created by the developmet team at Start Bootstrap</p> -->
                                            <a class="btn btn-purple btn-marketing btn-block rounded-pill lift lift-sm" href="{{url("/encontrecuidador")}}">Encontre um cuidador</a>
                                            <a class="btn btn-green btn-marketing btn-block rounded-pill lift lift-sm" href="{{url("prestador/create")}}">Seja um cuidador</a>
                                        </div>
                                        <div class="col-lg-6 d-none d-lg-block" data-aos="fade-up" data-aos-delay="50"><img class="img-fluid" src="assets/layout/img/cuidadores.svg" /></div>
                                    </div>
                                </div>
                            </div>
                            <div class="svg-border-rounded text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
                            </div>
                        </header>
                        <section class="bg-white py-10">
                            <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6" data-aos="fade-up">
                                            <h2>O que somos?</h2>
                                            <p>Wecares é uma plataforma que conecta pessoas à profissionais que prestam serviços de cuidados pessoais.
                                               Queremos ajudar você a encontrar profissionais de todo Brasil que ofereçam serviços com qualidade e segurança</p>
                                            <p>Quer entender como contratar um profissional? Então <a href="{{url("/")}}">clique aqui</a>(*Abrir modal com video*)</p>                                            <!-- <p class="page-header-text mb-5">Welcome to SB UI Kit Pro, a toolkit for building beautiful web interfaces, created by the developmet team at Start Bootstrap</p> -->
                                        </div>
                                        <div class="col-lg-6 d-none d-lg-block" data-aos="fade-up" data-aos-delay="50"><img class="img-fluid" src="assets/layout/img/cuidados.png" /></div>
                                    </div>
                                </div>
                            <div class="svg-border-rounded text-light">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
                            </div>
                        </section>
                        <section class="bg-light py-10">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-6" data-aos="fade-up">
                                        <h2>Compromisso com a segurança</h2>
                                        <p>Cada recurso de segurança implantado e cada orientação em nosso código de conduta representa nosso compromisso com a sua proteção.</p>
                                        <p>Saiba mais sobre nosso <a href="{{url("/conduta")}}">código de conduta</a></p>                                            <!-- <p class="page-header-text mb-5">Welcome to SB UI Kit Pro, a toolkit for building beautiful web interfaces, created by the developmet team at Start Bootstrap</p> -->
                                    </div>
                                    <div class="col-lg-6 d-none d-lg-block" data-aos="fade-up" data-aos-delay="50"><img class="img-fluid" src="assets/layout/img/seguranca.svg" /></div>
                                </div>
                            <div class="svg-border-rounded text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
                            </div>
                        </section>
                </main>
            </div>
        </div>
@endsection