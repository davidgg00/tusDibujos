<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <header class="col-md-12 d-flex justify-content-between p-0">

            <nav class="navbar navbar-expand-md navbar-light bg-dark fixed-top d-flex justify-content-between">

                <a class="navbar-brand">
                    <h3 class="font-weight-bold">TUS DIBUJOS</h3>
                </a>

                <button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">

                    <span class="navbar-toggler-icon"></span>

                </button>

                <div class="collapse navbar-collapse col-md-6" id="nav">

                    <ul class="navbar-nav d-flex justify-content-between">

                        <li class="nav-item">

                            <a class="nav-link text-light font-weight-bold px-3" href="{{ url('/') }}">Inicio</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-light font-weight-bold px-3" href="{{route('random')}}">Aleatorio</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-light font-weight-bold px-3" href="{{route('mejoresDibujos')}}">Mejores</a>

                        </li>

                        @if(!Auth::check())

                        <li class="nav-item">

                            <a class="nav-link text-light font-weight-bold px-3" href="{{route('login')}}">Iniciar Sesión</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-light font-weight-bold px-3" href="{{route('register')}}">Registrate</a>

                        </li>

                        @else

                        <li class="nav-item">

                            <a class="nav-link text-light font-weight-bold px-3" href="{{route('subirDibujo')}}">Subir Dibujo</a>

                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link text-light font-weight-bold px-3" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                        @endif

                    </ul>




                </div>

            </nav>
        </header>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>