@extends('templates.template')
@section('content')
<div id="layoutDefault">
    <div id="layoutDefault_content">
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
            <div class="page-header-content pt-10">
                <div class="container text-center">
                    <div class="row justify-content-center">   
                        <div class="col-lg-8">
                            <h1 class="page-header-title mb-3">Cadastro feito com sucesso.</h1>
                            <p class="page-header-text">Seus dados foram recebidos pela nossa equipe e o resultado da análise será enviado em até 72 horas.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="svg-border-rounded text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
            </div>
        </header>
        {{-- <section class="bg-white py-10">
            <div class="container">
                <p class="lead">Nossa equipe irá analisar minuciosamente os dados enviados, em até 72 horas enviaremos o resultado da análise</p>
            </div>
            <div class="svg-border-rounded text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
            </div>
        </section> --}}
    </div>
</div>
@endsection