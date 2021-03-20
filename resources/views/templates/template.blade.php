<!DOCTYPE html>
<html lang="pt-br">
<head>
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
                                        {{-- Dropdown solicitante --}}
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
                                        @role('cuidador/enfermeiro')
                                            <a class="dropdown-item" href="{{url("/cadastroPrestador")}}">
                                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Dados cadastrais
                                            </a>
                                            <a class="dropdown-item" href="{{url("/servicosPrestados")}}">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-medical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4 1h5v1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6h1v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2z"/>
                                                    <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 0 1 9 4.5z"/>
                                                    <path fill-rule="evenodd" d="M7 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L8 6l.549.317a.5.5 0 1 1-.5.866L7.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L6 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 7 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                                </svg>
                                                &nbsp&nbsp
                                                <span>Serviços prestados</span>
                                            </a>
                                            <a class="dropdown-item" href="{{url("/novaspropostas")}}">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-medical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4 1h5v1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6h1v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2z"/>
                                                    <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 0 1 9 4.5z"/>
                                                    <path fill-rule="evenodd" d="M7 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L8 6l.549.317a.5.5 0 1 1-.5.866L7.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L6 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 7 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                                </svg>
                                                &nbsp&nbsp
                                                <span>Propostas de serviço</span>
                                            </a>
                                            <a class="dropdown-item" href="{{url("/recebimentos")}}">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-wallet2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.5 4l10-3A1.5 1.5 0 0 1 14 2.5v2h-1v-2a.5.5 0 0 0-.5-.5L5.833 4H2.5z"/>
                                                    <path fill-rule="evenodd" d="M1 5.5A1.5 1.5 0 0 1 2.5 4h11A1.5 1.5 0 0 1 15 5.5v8a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 13.5v-8zM2.5 5a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-11z"/>
                                                </svg>
                                                &nbsp&nbsp
                                                <span>Recebimentos</span>
                                            </a>
                                        @endrole
                                        @role('administrador')
                                            <a class="dropdown-item" href="{{"/menu"}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                    <path d="M0,172v-172h172v172z" fill="#456bd8"></path><g fill="#ffffff">
                                                    <path d="M26.875,10.32c-1.65281,0.30906 -2.83531,1.76031 -2.795,3.44v134.16c0,1.89469 1.54531,3.44 3.44,3.44h48.16c1.89469,0 3.44,-1.54531 3.44,-3.44v-134.16c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM30.96,17.2h41.28v127.28h-41.28zM96.32,44.72c-1.89469,0 -3.44,1.54531 -3.44,3.44v99.76c0,1.89469 1.54531,3.44 3.44,3.44h48.16c1.89469,0 3.44,-1.54531 3.44,-3.44v-99.76c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM10.32,158.24v6.88h151.36v-6.88z"></path></g></g>
                                                </svg>
                                                &nbsp&nbsp
                                                <span>Dashboard</span>
                                            </a>
                                            <a class="dropdown-item" href="{{url("/adminCadastro")}}">
                                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Dados cadastrais
                                            </a>
                                            <a class="dropdown-item" href="{{url("/listagemAdmin")}}">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-medical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4 1h5v1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6h1v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2z"/>
                                                    <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 0 1 9 4.5z"/>
                                                    <path fill-rule="evenodd" d="M7 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L8 6l.549.317a.5.5 0 1 1-.5.866L7.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L6 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 7 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                                </svg>
                                                &nbsp&nbsp
                                                <span>Lista de administradores</span>
                                            </a>
                                            <a class="dropdown-item" href="{{url("/prestadoresLista")}}">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-medical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4 1h5v1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6h1v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2z"/>
                                                    <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 0 1 9 4.5z"/>
                                                    <path fill-rule="evenodd" d="M7 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L8 6l.549.317a.5.5 0 1 1-.5.866L7.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L6 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 7 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                                </svg>
                                                &nbsp&nbsp
                                                <span> Lista de prestadores</span>
                                            </a>
                                            <a class="dropdown-item" href="{{url("listagemServicos")}}">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-medical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4 1h5v1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6h1v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2z"/>
                                                    <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 0 1 9 4.5z"/>
                                                    <path fill-rule="evenodd" d="M7 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L8 6l.549.317a.5.5 0 1 1-.5.866L7.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L6 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 7 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                                </svg>
                                                &nbsp&nbsp
                                                <span>Lista de serviços prestados</span>
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