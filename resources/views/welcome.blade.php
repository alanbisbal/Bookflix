<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bookflix</title>
  <link rel="shortcut icon" type="image/x-icon" href="imagenes/LogoBookflix.ico">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="css/estilos-welcome.css">
</head>
<body>
<div class="container">
  <div class="item1">
    @if (Route::has('login'))
      <nav class="navbar navbar-expand-lg">
        @auth
          @if(auth()->user()->es_admin)
            <a class="navbar-brand" href="{{ route('administracion') }}">
              <img src="/imagenes/bookflixnegro.png">
            </a>
            <ul class="navbar-nav" >
              <li class="nav-item">
                <a class="nav-link" href="{{ route('administracion') }}">
                  <span class="alinear">
                    Home
                  </span>
                </a>
              </li>
            </ul>
          @else
            <a class="navbar-brand" href="{{ route('seleccionPerfil') }}">
              <img src="/imagenes/bookflixnegro.png">
            </a>
            <ul class="navbar-nav" >
              <li class="nav-item">
                <a class="nav-link" href="{{ route('seleccionPerfil') }}">
                  <span class="alinear">
                    Home
                  </span>
                </a>
              </li>
            </ul>
          @endif
          @else
            <a class="navbar-brand" href="/">
              <img src="/imagenes/bookflixnegro.png">
            </a>
            <ul class="navbar-nav" >
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                  <span class="alinear">
                    Iniciar sesión
                  </span>
                </a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">
                  <span class="alinear">
                    Registrarse
                  </span>
                </a>
              </li>
              @endif
            </ul>
        @endauth
      </nav>
    @endif
  </div>   <!--  CIERRA ITEM1 -->
  <div class="item2">
    <div class="background-overlay">
      <div class="menu text-white">
          <h1>Bienvenido a Bookflix!</h1>
          <p>El sitio web donde vas a encontrar más de 70000 títulos, suscribite ya!</p>
      </div>
      <div class="barra">
        @include('vistas-includes.seccion-noticias')
      </div>
    </div>
  </div>   <!--CIERRO ITEM2-->
  <div class="item3">
    <footer class="pie">
      @include('vistas-includes.pie')
    </footer>
  </div>   <!-- CIERRO ITEM3-->
</div>   <!--CIERRO CONTAINER -->
</body>
</html>
