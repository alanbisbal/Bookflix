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
    <style>
      html{
        width: 100%;
        height: 100vh;
      }
      body{
        width: 100%;
        height: 100vh;
      }
      .container{
        width: 100%;
        height: 100vh;
        display: grid;
        max-width: 100%;
        max-height: 100%;
        grid-template-rows: 15% 81% 4%;
        padding: 0;
        overflow: hidden;
      }
      .header{
        width: 100%;
        height: 100%;
      }
      .navbar{
        height: 100%;
        width: 100%;
        background: black;
        display: flex;
        align-self: center;
        justify-content: space-between;
        flex-wrap: nowrap;
      }
      .navbar-brand{
        margin-left: 50px;
        width: 12%;
        height: 100%;
        min-width: 150px;
        align-self: center;
      }
      ul{
        margin-right: 30px;
      }
      .nav-item{
        margin-right: 40px;
        align-self: center;
      }
      .nav-link{
        background-color: white;
        color:red;
        border-radius: 6px;
        width: 180px;
        height: 60px;
        text-align: center;
        font-size: 20px;
        align-items: center;
      }
      @media (max-width:800px){
        .nav-link{
          width: 110px;
          font-size: 16px;
          height: 50px;
          align-self: center;
        }
      }
      .nav-link:hover{
          font-weight: bold;
          color: red;
      }
      .alinear{
        vertical-align: sub;
        color:red;
      }
      main{
        display: inherit;
      }
      .menu{
        background: url(/imagenes/biblioteca.jpg);
        background-size: cover;
        position: relative;
      }
      .background-overlay{
        background: rgba(170, 96, 96, .4);
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        position: absolute;
      }
      .card{
        margin-top: 50px;
      }
      .pie{
        background-color: black;
        color: red;
        width: 100%;
        height: 100%;
        font-family: Courier New;
        vertical-align: center;
        display: flex;
        justify-content: space-between;
        padding: 0px 10px;
        align-items: center;
      }
      .btn-general{
        background-color: black;
        color: red;
        border-color: black;
      }
      .btn-general:hover{
        font-weight: bold;
        background-color: black;
        color: red;
        border-color: black;
      }
      .btn-link{
        color: black;
        width: 290px;
      }
      .btn-link:hover{
        text-decoration: none;
        color: black;
        font-weight: bold;
      }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
              @auth
              @if(auth()->user()->es_admin)
                <a href="{{ route('administracion') }}">Bookflix</a>
                @else
                  <a href="{{ route('seleccionPerfil') }}">Cambiar Perfil</a>
                  @if(!empty($perfilActivo))
                      <a href="{{ route('home',$perfilActivo->id) }}">Home</a>
                      @endif
                      <spbc>
                 @endif
            @else
              <a href="{{ url('/') }}">Bookflix</a>
            @endauth
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>
                </div>

            </div>
          </nav>
        </header>
        <main class="">
            @yield('content')
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
