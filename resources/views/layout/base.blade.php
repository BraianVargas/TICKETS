<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title') - Laravel App
    </title>

    <link rel="stylesheet" href="{{asset('/css/main.css')}}" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://i.icomoon.io/public/temp/76923534ae/UntitledProject/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
        <div class="container-fluid">
            {{-- add logo like brand --}}
            @if(auth()->check())
                <a class="navbar-brand fs-2 text-center align-baseline" href="{{route(auth()->user()->role)}}">
                    <img src="{{asset('/img/logo.png')}}" width="80" height="50" class="d-inline-block align-baseline" alt="">
                </a>
            @else
                <a class="navbar-brand fs-2 text-center align-baseline" href="">
                    <img src="{{asset('/img/logo.png')}}" width="80" height="50" class="d-inline-block align-baseline" alt="">
                </a>
            @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex">
                <div class="container">
                    <div class="text-white collapse navbar-collapse" id="navbarNavDropdown">
                        @if(route('login') == url()->current())
                            <ul class="navbar-nav nav">
                                <li class="nav-item">
                                    <a class="nav-link text-white toHover active" aria-current="page" href="{{ route('login') }}">Inicio</a>
                                </li>
                            </ul>
                        @elseif (route('register') == url()->current())
                            <ul class="navbar-nav nav">
                                <li class="nav-item">
                                    <a class="nav-link text-white toHover active" aria-current="page" href="{{ route('login') }}">Inicio</a>
                                </li>
                            </ul>
                        @else
                            @if(auth()->check())
                                @if (auth()->user()->role == 'user')
                                    <ul class="navbar-nav nav">
                                        <li class="nav-item">
                                            <a class="nav-link text-white toHover active" href="{{ route('user') }}"><i class="bi bi-house-door">&nbsp;Inicio</i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white toHover" href="{{route('tickets')}}"><i class="bi bi-receipt">&nbsp;Tickets</i> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white toHover" href="{{route('client.index')}}"><i class="bi bi-people">&nbsp;Clientes</i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white toHover" href="{{route('logout')}}"><i class="bi bi-door-open"></i> &nbsp;Cerrar Sesión</a>
                                        </li>
                                    </ul>
                                @else
                                    @if(auth()->user()->role == 'admin')
                                        <ul class="navbar-nav nav">
                                            <li class="nav-item">
                                                <a class="text-white toHover nav-link active" href="{{ route('admin') }}"><i class="bi bi-house-door">&nbsp;Inicio</i></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="text-white toHover nav-link" href="{{route('tickets')}}"><i class="bi bi-receipt">&nbsp;Tickets</i></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="text-white toHover nav-link" href="{{route('client.index')}}"><i class="bi bi-people">&nbsp;Clientes</i></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="text-white toHover nav-link" href="{{route('reports.index')}}"><i class="bi bi-file-earmark-spreadsheet">&nbsp;Reportes</i> </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="text-white toHover nav-link" href="{{route('logout')}}"><i class="bi bi-door-open">&nbsp;Cerrar Sesión</i> </a>
                                            </li>
                                        </ul>
                                    @else
                                        
                                    @endif
                                    
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
    






    <div class="container-fluid">
        <div class="container">
            @yield('content')
        </div>
    </div>



    <footer class="bg-dark text-white p-3 mt-5 sticky m-auto">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('/img/logo.png')}}" width="80" height="50" class="d-inline-block align-baseline" alt="">
                        <p>Sistema de Gestión de Reclamos</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Contacto</h5>
                        <p>
                            <i class="bi bi-phone"></i>
                            <span></span>
                        </p>
                        <p>
                            <i class="bi bi-envelope"></i>
                            <span>
                                <a href="mailto:" class="text-white">

                                </a>
                            </span>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h5>Soporte</h5>
                        <p>
                            <i class="bi bi-code-slash"></i>
                            <span>
                                <a href="https://bricode-sj.web.app" class="text-link text-decoration-none" target="_blank">
                                    Desarrollado por BriCode
                                </a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid"
                style="
                    margin-top: 1rem;
                    margin-bottom: 1rem;
                    border: 0;
                    border-top: 1px solid rgba(255, 255, 255, 0.544);
                "
            >
            </div>

            <div>
                <p class="text-white text-center">
                    © <a href="https://bricode-sj.web.app" class="text-link text-decoration-none" target="_blank"> BriCode </a> 2022 - Todos los derechos Reservados
                </p>
            </div>
        </div>
    </footer>

</body>

</html>
