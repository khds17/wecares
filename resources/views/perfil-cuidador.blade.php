@extends('templates.template')

@section('content')
<header class="page-header page-header-dark bg-img-cover overlay overlay-secondary overlay-90">
    <div class="page-header-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 text-center">
                    <img class="mb-4" src="assets/layout/img/avataaars.svg" style="width: 15rem;" />
                        <h1 class="page-header-title">Welcome to my portfolio!</h1>
                        <p class="page-header-text">I am a graphic artist, illustrator, and UI designer specializing in modern, creative design based in Wildemount, TX</p>
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
    <div class="svg-border-rounded text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
    </div>
</section>
<section class="bg-white py-10">
    <div class="container">
        <div class="card-columns card-columns-portfolio">
            <a class="card card-portfolio" href="#!"></a>

        </div>
    </div>
    <div class="svg-border-rounded text-light">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
    </div>
</section>
<section class="bg-light py-10">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2>Contact me</h2>
                <p class="mb-5">I am available for contract work, when you're ready - let me know!</p>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon-stack icon-stack-lg bg-orange text-white mb-3"><i data-feather="mail"></i></div>
                                <div class="small"><a href="#!">hello@example.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon-stack icon-stack-lg bg-green text-white mb-3"><i data-feather="smartphone"></i></div>
                                <div class="small">555-123-4567</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="svg-border-rounded text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
    </div>
</section>
@endsection