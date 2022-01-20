<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title') - Laravel App
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://i.icomoon.io/public/temp/76923534ae/UntitledProject/style.css">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand fs-2" href="#">SGR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        @if(route('login') == url()->current())
                            <ul class="navbar-nav nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Inicio</a>
                                </li>
                            </ul>
                        @else
                            {{-- @if (route('register') == url()->current())
                                <ul class="navbar-nav nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Inicio</a>
                                    </li>
                                </ul>
                            @else --}}
                            @if(auth() -> user() -> role == 'user')
                                @if(auth()->check())
                                    <ul class="navbar-nav nav">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="{{ route('user') }}">Inicio</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('tickets')}}">Tickets</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('clientes')}}">Clientes</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Menú
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <li><a class="dropdown-item" href="{{route('logout')}}">Cerrar Sesión</a></li>
                                                <li><a class="dropdown-item" href="#">Clientes</a></li>
                                            </ul>
                                        </li>
                                    </ul>
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

    {{-- black footer with logo, contacts and info --}}
    <footer class="bg-dark text-white mt-5 p-4 text-center sticky-bottom">
        <div class="row">
            <div class="col-md-4">
                <h4>Contact Us</h4>
                <p>
                    <i class="fas fa-home"></i>
                    <span>Address:</span>
                    <br>
                    <span>City:</span>
                    <br>
                    <span>Country:</span>
                </p>
            </div>
            <div class="col-md-4">
                <h4>About Us</h4>
                <p>
                    <i class="fas fa-info"></i>
                    <span>About:</span>
                    <br>
                    <span>Contact:</span>
                    <br>
                    <span>Email:</span>
                </p>
            </div>
            <div class="col-md-4">
                <h4>Social Media</h4>
                <p>
                    <i class="fab fa-facebook-square"></i>
                    <i class="fab fa-twitter-square"></i>
                    <i class="fab fa-instagram"></i>
                </p>
            </div>
        </div>
    </footer>
</body>

</html>
