<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/LogoBookflix.ico">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <title>{{ config('app.name', 'Laravel') }}</title> LO CAMBIÉ, ANA-->
    <title>Bookflix</title>
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/LogoBookflix.ico">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilos-app.css">
</head>
<body>
  <div id="app" class="container">
    <header class="header">
      <nav class="navbar navbar-expand-lg navbar-fixed">
        @auth
          @if(auth()->user()->es_admin)
            <a class="navbar-brand" href="{{ route('administracion') }}"><img src="/imagenes/bookflixnegro.png" style="width: 100%"></a>
          @else
            <a class="navbar-brand" href="{{ route('seleccionPerfil') }}"><img src="/imagenes/bookflixnegro.png" style="width: 100%"></a>
            <ul class="navbar-nav" >
              <li class="nav-item">
                <a class="nav-link" href="{{ route('seleccionPerfil') }}">
                  <span class="alinear">
                    Cambiar Perfil
                  </span>
                </a>
              </li>
            </ul>
            @if(!empty($perfilActivo))
              <ul class="navbar-nav" >
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('home',$perfilActivo->id) }}">
                    <span class="alinear">
                      Home
                    </span>
                  </a>
                </li>
              </ul>
            @endif          
          @endif
          @else
            <a class="navbar-brand" href="{{ url('/') }}"><img src="/imagenes/bookflixnegro.png" style="width: 100%"></a>
        @endauth
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                    <!-- Left Side Of Navbar -->
                    <!-- Right Side Of Navbar -->
        <ul class="navbar-nav">
              <!-- Authentication Links -->
          @guest
            <li class="nav-item">
              <a class="nav-link " href="/"><span class="alinear">{{ __('Inicio') }}</span></a>
            </li>
                            <!--ESTABA: <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif-->
          @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Cerrar sesión') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
        </ul>
      </nav>
    </header>
    <main>
      <div class="menu">
        <div class="background-overlay">  
          @yield('content')
        </div>
      </div>
    </main>
    <footer class="pie">
      <div class="pie-izq">
        Ingeniería de Software 2 - Grupo 46
      </div>
      <div class="pie-der font-italic">
        BAM © 2020
      </div>
    </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
