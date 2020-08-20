<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Solicitante</title>
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/bootstrap/js/bootstrap.min.js')}}">
</head>


<header>
    <div>
        <li>
            <a>Home</a>
        </li>
        <li>
            <a> Quem somos </a>
        </li>
        <li>
            <a> Seja um cuidador</a>
        </li>
        <li>
            <a> Entrar</a>
        </li>
    </div>
</header>


<body>
    @yield('content')
    <footer>
        <div>
            <div class="copyright text-center my-auto">
                <span>Todos os direitos reservados a WeCares</span>
            </div>
        </div>
    </footer> 
    <script src="{{url('assets/js/javascript.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>