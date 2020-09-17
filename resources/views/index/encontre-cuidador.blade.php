@extends('templates.template')
@section('content')
<header class="page-header page-header-dark bg-img-cover overlay overlay-secondary overlay-90" style='background-image: url("https://drive.google.com/file/d/1EkJcyR65gl8FvOZAIX15s4i00kXKp_4w/view?usp=sharing")'>
    <div class="page-header-content py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 text-center">
                    <h1 class="page-header-title">Encontre um cuidador</h1>
                    <p class="page-header-text mb-5">Digite o seu CEP ou sua cidade</p>
                    <form class="page-header-signup mb-2 mb-md-0">
                        <div class="form-row justify-content-center">
                            <div class="col-lg-9 col-md-8">
                                <div class="form-group mr-0 mr-lg-2"><label class="sr-only" for="inputSearch">Insira seu CEP ou cidade </label><input class="form-control form-control-solid rounded-pill" id="inputSearch" type="text" placeholder="Insira seu CEP ou cidade" /></div>
                            </div>
                            <div class="col-lg-3 col-md-4"><a class="btn btn-teal btn-block btn-marketing rounded-pill" href="{{url("/resultado")}}">Encontrar</a></button></div> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="svg-border-rounded text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
    </div>
</header>
@endsection