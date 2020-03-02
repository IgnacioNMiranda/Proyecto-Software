<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <div id="app">
        <style>.dropdown:hover>.dropdown-menu {display: block;}</style>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="http://www.ucn.cl/">
                <img src="https://www.ucn.cl/wp-content/uploads/2018/05/Escudo-UCN-Full-Color.png" width="50"
                    height="50" alt="Logo UCN">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-white font-weight-bold btn-lg" href="{{ url('/') }}">Inicio <span
                                class="sr-only">(current)</span></a>
                    </li>

                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white btn-lg" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Usuarios
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('users.create') }}">Crear usuario</a>
                            <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Editar usuario</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white btn-lg" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Proyectos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('projects.create') }}">Crear proyecto</a>
                            <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Editar proyecto</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white btn-lg" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Productos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('products.create') }}">Crear producto</a>
                            <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Editar producto</a>
                        </div>
                    </li>
                    @endauth


                </ul>
            </div>

            @auth
                <span class="navbar-text text-white d-inline">Bienvenido, {{ Auth::user()->name }} <span
                    class="sr-only">(current)</span>
            @endauth

            @if (Route::has('login'))
                <div class="top-right links navbar-item">
                    @auth
                    <a class="text-white navbar-text" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        <span class="sr-only">(current)</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="text-white">Login <span class="sr-only">(current)</span></a>
                    @endauth
                </div>
             @endif

        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<!--Archivos JS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Bootstrap Dropdown Hover JS -->
<script src="js/bootstrap-dropdownhover.min.js"></script>

</html>