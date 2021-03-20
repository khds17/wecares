<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-59QVHQ3');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WeCares</title>
    <link href="{{url('assets/layout/css/styles.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="{{url('assets/layout/css/jquery-ui.min.css')}}">
    {{-- <link rel="icon" type="image/x-icon" href="{{url('assets/layout/img/favicon.png')}}" /> --}}
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-59QVHQ3" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="layoutDefault">
            <div id="layoutDefault_content">
                <main>
                    <nav class="navbar navbar-marketing navbar-expand-lg bg-transparent navbar-dark fixed-top">
                        <div class="container">
                            <a class="navbar-brand text-white" href="{{url("/")}}">WeCares</a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i data-feather="menu"></i></button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto mr-lg-5">
                                    <li class="nav-item dropdown no-caret">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="{{url("/encontreCuidador")}}" role="button" aria-haspopup="true" aria-expanded="false">Encontre um cuidador</a>
                                        <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="{{url("prestador/create")}}" role="button" aria-haspopup="true" aria-expanded="false">Seja um cuidador</a>
                                        <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="{{url("solicitante/create")}}" role="button" aria-haspopup="true" aria-expanded="false">Seja um solicitante</a>
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
                                {{-- <a class="btn-teal btn rounded-pill px-4 ml-lg-4" data-toggle="modal" data-target="#modalLogin"> Entrar</a> --}}
                                @if (Auth::user())
                                    <a class="text-white" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }}</a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        {{-- Menu do administrador --}}
                                        @role('administrador')
                                            <a class="dropdown-item" href="{{"/menu"}}">
                                                <i class="fas fa-chart-line fa-sm fa-fw mr-2 text-gray-400"></i>
                                                <span>Dashboard</span>
                                            </a>
                                            <a class="dropdown-item" href="{{url("/cadastroAdmin")}}">
                                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Dados cadastrais
                                            </a>
                                            <a class="dropdown-item" href="{{url("/listagemAdmin")}}">
                                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                                <span>Lista de administradores</span>
                                            </a>
                                            <a class="dropdown-item" href="{{url("/prestadoresLista")}}">
                                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                                <span> Lista de prestadores</span>
                                            </a>
                                            <a class="dropdown-item" href="{{url("listagemServicos")}}">
                                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                                <span>Lista de serviços concluídos</span>
                                            </a>
                                        @endrole
                                        {{-- Menu do cuidador --}}
                                        @role('cuidador/enfermeiro')
                                            <a class="dropdown-item" href="{{url("/cadastroPrestador")}}">
                                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Dados cadastrais
                                            </a>
                                            <a class="dropdown-item" href="{{url("/servicosPrestados")}}">
                                                <i class="far fa-handshake fa-sm fa-fw mr-2 text-gray-400"></i>
                                                <span>Serviços prestados</span>
                                            </a>
                                            <a class="dropdown-item" href="{{url("/novaspropostas")}}">
                                                <i class="fas fa-file-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                <span>Propostas de serviço</span>
                                            </a>
                                            <a class="dropdown-item" href="{{url("/recebimentos")}}">
                                                <i class="fas fa-wallet fa-sm fa-fw mr-2 text-gray-400"></i>
                                                <span>Recebimentos</span>
                                            </a>
                                        @endrole
                                        {{-- Menu do solicitante --}}
                                        @role('solicitante')
                                            <a class="dropdown-item" href="{{url("/cadastroSolicitante")}}">
                                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Dados cadastrais
                                            </a>
                                            <a class="dropdown-item" href="{{url("/paciente")}}">
                                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Dados do paciente
                                            </a>
                                            <a class="dropdown-item" href="{{url("/servicosContratados")}}">
                                                <i class="far fa-handshake fa-sm fa-fw mr-2 text-gray-400"></i>
                                                <span>Serviços contratados</span>
                                            </a>
                                            <a class="dropdown-item" href="{{url("/propostas")}}">
                                                <i class="fas fa-file-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                <span>Propostas pendentes</span>
                                            </a>
                                            <a class="dropdown-item" href="{{url("/pagamentos")}}">
                                                <i class="far fa-credit-card fa-sm fa-fw mr-2 text-gray-400"></i>
                                                <span>Pagamentos</span>
                                            </a>
                                        @endrole
                                        <a class="dropdown-item" href="{{url("/registros")}}">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Registro de atividades
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Sair') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                @else
                                    <a class="btn-teal btn rounded-pill px-4 ml-lg-4" href="{{url("login")}}"> Entrar</a>
                                @endif

                            </div>
                        </div>
                    </nav>
                    {{-- <!-- Modal -->
                    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLoginLabel">Entrar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form class="user">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="E-mail">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Senha">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Lembrar-me</label>
                                        </div>
                                    </div>
                                    <a href="index.html" class="btn btn-primary btn-user btn-block">
                                    Login
                                    </a>
                                    <hr>
                                    <a href="index.html" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login com Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login com Facebook
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Esqueceu a senha?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{url("solicitante/create")}}">Crie uma conta de solicitante!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{url("prestador/create")}}">Crie uma conta de cuidador!</a>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fim modal --> --}}
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
                                    <a class="icon-list-social-link" href="https://www.facebook.com/Wecares-103096788530580" target="_blank">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                    <a class="icon-list-social-link" href="https://www.instagram.com/wecaresoficial/" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a class="icon-list-social-link" href="javascript:void(0);">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    <a class="icon-list-social-link" href="javascript:void(0);">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                                        <div class="text-uppercase-expanded text-xs mb-4">Empresa</div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><a href="{{url("/sobre")}}">Quem somos</a></li>
                                            {{-- <li class="mb-2"><a href="javascript:void(0);">Como funciona?</a></li> --}}
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                                        <div class="text-uppercase-expanded text-xs mb-4">Serviços</div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><a href="{{url("/encontreCuidador")}}">Encontre um cuidador</a></li>
                                            <li class="mb-2"><a href="{{url("prestador/create")}}">Seja um cuidador</a></li>
                                            <li class="mb-2"><a href="{{url("solicitante/create")}}">Seja um solicitante</a></li>
                                            {{-- <li class="mb-2"><a href="javascript:void(0);">Dicas de contratação</a></li> --}}
                                            {{-- <li class="mb-2"><a href="javascript:void(0);">Dicas de segurança</a></li> --}}
                                        </ul>
                                    </div>
                                    {{-- <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                                        <div class="text-uppercase-expanded text-xs mb-4">Ajuda</div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><a href="">Dúvidas frequentes</a></li>
                                        </ul>
                                    </div> --}}
                                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                                        <div class="text-uppercase-expanded text-xs mb-4">Contato</div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><a>contato@wecares.com.br</a></li>
                                            {{-- <li class="mb-2"><a>(19) 99558-3696</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-5" />
                        <div class="row align-items-center">
                            <div class="col-md-6 small">Copyright &copy; WeCares 2021</div>
                            <div class="col-md-6 text-md-right small">
                                {{-- <a href="{{url("/privacidade")}}">Privacidade</a> --}}
                                &middot;
                                <a href="{{url("/termos")}}">Termos de uso</a>
                                &middot;
                                <a href="{{url("/privacidade")}}">Termos de privacidade</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{url('assets/layout/js/javascript.js')}}"></script>
    <script src="{{url('assets/layout/js/solicitacaoServico.js')}}"></script>
    <script src="{{url('assets/layout/js/camposOcultos.js')}}"></script>
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