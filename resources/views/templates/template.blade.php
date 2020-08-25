<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WeCares</title>
    <link href="{{url('assets/layout/css/styles.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="icon" type="image/x-icon" href="{{url('assets/layout/img/favicon.png')}}" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="layoutDefault">
            <div id="layoutDefault_content">
                <main>
                    <nav class="navbar navbar-marketing navbar-expand-lg bg-transparent navbar-dark fixed-top">
                        <div class="container">
                            <a class="navbar-brand text-white" href="index.html">WeCares</a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i data-feather="menu"></i></button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto mr-lg-5">
                                    <li class="nav-item dropdown no-caret">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="#" role="button" aria-haspopup="true" aria-expanded="false">Encontre um cuidador</a>
                                        <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="{{url("prestador/create")}}" role="button" aria-haspopup="true" aria-expanded="false">Seja um cuidador</a>
                                    </li>
                                    <!-- <li class="nav-item dropdown dropdown-xl no-caret">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdownDemos" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Empresa<i class="fas fa-chevron-right dropdown-arrow"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right animated--fade-in-up mr-lg-n15" aria-labelledby="navbarDropdownDemos">
                                            <div class="row no-gutters">
                                                <div class="col-lg-7 p-lg-5">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <a class="dropdown-item" href="landing-app-mobile.html">Quem somos</a><a class="dropdown-item" href="landing-app-desktop.html">Como o WeCares funciona</a><a class="dropdown-item" href="landing-app-desktop.html">Segurança</a><a class="dropdown-item" href="landing-app-desktop.html">Termos</a><a class="dropdown-item" href="landing-app-desktop.html">Privacidade</a>
                                                            <div class="dropdown-divider border-0"></div>
                                                            <div class="dropdown-divider border-0 d-lg-none"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li> -->
                                </ul>
                                <a class="btn-teal btn rounded-pill px-4 ml-lg-4" href="https://shop.startbootstrap.com/sb-ui-kit-pro">Entrar</a>
                            </div>
                        </div>
                    </nav>
    
        </main>       
    </div>
    @yield('content')
    <div id="layoutDefault_footer">
                <footer class="footer pt-10 pb-5 mt-auto bg-white footer-light">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="footer-brand">WeCares</div>
                                <div class="icon-list-social mb-5">
                                    <a class="icon-list-social-link" href="javascript:void(0);"><i class="fab fa-instagram"></i></a><a class="icon-list-social-link" href="javascript:void(0);"><i class="fab fa-facebook"></i></a><a class="icon-list-social-link" href="javascript:void(0);"><i class="fab fa-github"></i></a><a class="icon-list-social-link" href="javascript:void(0);"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                                        <div class="text-uppercase-expanded text-xs mb-4">Empresa</div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><a href="{{url("/sobre")}}">Quem somos</a></li>
                                            <li class="mb-2"><a href="javascript:void(0);">Como funciona?</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                                        <div class="text-uppercase-expanded text-xs mb-4">Serviços</div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><a href="{{url("prestador/create")}}">Seja um cuidador</a></li>
                                            <li class="mb-2"><a href="javascript:void(0);">Encontre um cuidador</a></li>
                                            <li class="mb-2"><a href="javascript:void(0);">Dicas de contratação</a></li>
                                            <li class="mb-2"><a href="javascript:void(0);">Dicas de segurança</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                                        <div class="text-uppercase-expanded text-xs mb-4">Ajuda</div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><a href="">Dúvidas frequentes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-5" />
                        <div class="row align-items-center">
                            <div class="col-md-6 small">Copyright &copy; WeCares 2020</div>
                            <div class="col-md-6 text-md-right small">
                                <a href="{{url("/privacidade")}}">Privacidade</a>
                                &middot;
                                <a href="{{url("/termos")}}">Termos</a>
                                &middot;
                                <a href="{{url("/conduta")}}">Código de conduta</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{url('assets/layout/js/javascript.js')}}"></script>
    <script src="{{url('assets/layout/js/scripts.js')}}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
            AOS.init({
                disable: 'mobile',
                duration: 600,
                once: true
            });
    </script>
</body>
</html>