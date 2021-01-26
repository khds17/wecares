@extends('templates.template')
@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary">
    <div class="page-header-content pt-10">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="page-header-title mb-3">WeCares</h1>
                        <p class="page-header-text">A cultura da nossa empresa e como fazemos as coisas</p>
                </div>
            </div>
        </div>
    </div>
    <div class="svg-border-rounded text-light">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
    </div>
</header>
<section class="bg-light py-10">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2 class="mb-4">Quem somos?</h2>
                <p>Wecares é uma plataforma que conecta pessoas à profissionais que prestam serviços de cuidados pessoais. Queremos ajudar você a encontrar profissionais de todo Brasil que ofereçam serviços com qualidade e segurança.</p>
                <hr class="my-5" />
                <h2 class="mb-4">Nossa história</h2>
                <p>O início da nossa história começou já no mundo digital em 2016, após um de nossos idealizadores Charleston Rafael participar de uma palestra sobre o universo de statups. 
                    Charleston então se aprofundou nos estudos sobre as necessidades da população brasileira e encontrou a dificuldade que as pessoas tem em encontrar profissionais que realizam os cuidados físicos de outras pessoas.
                    Charleston compartilhou a ideia com Kauan Henrique, Lucas Reis e Juliene Gomes e juntos idealizaram o WeCares. 
                <hr class="my-5" />
                {{-- <h2 class="mb-4">Missão</h2>
                <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum culpa optio nihil id distinctio excepturi dignissimos, iure totam minima, natus ducimus.</p>
                <hr class="my-5" />
                <h2 class="mb-4">Visão</h2>
                <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum culpa optio nihil id distinctio excepturi dignissimos, iure totam minima, natus ducimus.</p>
                <hr class="my-5" /> 
                <h2 class="mb-4">Valores</h2>
                <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum culpa optio nihil id distinctio excepturi dignissimos, iure totam minima, natus ducimus.</p>
                <hr class="my-5" />  --}}
            </div>
        </div>
    </div>
    <div class="svg-border-rounded text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
    </div>
</section>
@endsection