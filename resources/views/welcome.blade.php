<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Noticias de investigacion</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!--Archivos CSS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="css/styles.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <style>.dropdown:hover>.dropdown-menu{display:block;}</style>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="http://www.ucn.cl/">
                <img src="https://www.ucn.cl/wp-content/uploads/2018/05/Escudo-UCN-Full-Color.png" width="50" height="50" alt="Logo UCN">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link text-white font-weight-bold btn-lg" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white btn-lg" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Usuarios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('users.create') }}">Crear usuario</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Editar usuario</a>
                    </div>
                </li>

              </ul>

              &nbsp;
              <span class="navbar-text text-white btn-lg">Proyectos <span class="sr-only">(current)</span>
              &nbsp; 
              <span class="navbar-text text-white btn-lg">Productos <span class="sr-only">(current)</span>
            
            </div>

            @auth
                <span class="navbar-text text-white d-inline">Bienvenido, {{ Auth::user()->name }}  <span class="sr-only">(current)</span>
            @endauth

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="text-white navbar-text" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
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

        <p class="font-weight-bold text-dark mt-2 display-4">Grupos de investigación</p>

        <div class="container-fluid">
            <div class="row">

                <div class="col-1 col-md-3">
                    <a href="{{ url('#') }}">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body" style="background-color: skyblue">
                                <img class="card-img-top rounded-circle img-responsive" src="https://i.ytimg.com/vi/EiZ04L40JT4/hqdefault.jpg" alt="LogoGrupoInvestigacion" >
                            </div>
                            <div class="card-footer bg-primary">
                                <h3 class="card-text  text-white d-flex d-inline align-self-stretch">Los cazafantasmas</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-1 col-md-3 offset-1">
                    <a href="{{ url('#') }}">
                        <img class="card-img-top img-responsive" src="https://i.ytimg.com/vi/EiZ04L40JT4/hqdefault.jpg" alt="LogoGrupoInvestigacion">
                        <h3 class="card-text  text-dark d-flex d-inline align-self-stretch">Los cazafantasmas</h3>
                    </a>
                </div>

                <div class="col-1 col-md-3 offset-1">
                    jai
                </div>

                <div class="col-1 col-md-3 offset-1">
                    dsfjsk
                </div>

            </div>
        </div>
        

        <!--Archivos JS-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <!-- Bootstrap Dropdown Hover JS -->
        <script src="js/bootstrap-dropdownhover.min.js"></script>

    </body>
</html>
