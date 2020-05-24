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
                  <a class="navbar-brand" href="{{ route('administracion') }}"><img src="/imagenes/bookflixnegro.png" style="width: 100%"></a>
                  <ul class="navbar-nav" >
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('administracion') }}"><span class="alinear">Home</span></a>
                    </li>
                  </ul>
                          <!--<a href="{{ route('administracion') }}">Home</a>-->
                @else
                  <a class="navbar-brand" href="{{ route('seleccionPerfil') }}"><img src="/imagenes/bookflixnegro.png" style="width: 100%"></a>
                  <ul class="navbar-nav" >
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('seleccionPerfil') }}"><span class="alinear">Home</span></a>
                    </li>
                  </ul>
                        <!-- <a href="{{ route('seleccionPerfil') }}">Home</a> -->
                @endif
                @else
                      <!-- <a href="{{ route('login') }}">Login</a>

                      @if (Route::has('register'))
                          <a href="{{ route('register') }}">Register</a>
                      @endif -->
                <a class="navbar-brand" href="/"><img src="/imagenes/bookflixnegro.png" style="width: 100%"></a>
                <ul class="navbar-nav" >
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><span class="alinear">Iniciar sesión</span></a>
                  </li>
                  @if (Route::has('register'))
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><span class="alinear">Registrarse</span></a>
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
             <div class="card">
               <div class="card-header">
                 Sección de novedades
               </div>
               <div class="tarjetasanidadas ">
                 @foreach($novedades as $novedad)
                 <div class="text-dark tarjetaanidada-una">
                   <div class="card-body">
                     <h5 class="card-title text-Left">{{$novedad->titulo}}</h5>
                     <p class="card-text text-center">{{$novedad->desc}}</p>
                   </div>
                 </div>
                 @endforeach
               </div>
             </div>
           </div>
         </div>
       </div>   <!--CIERRO ITEM2-->
       <div class="item3">
         <footer class="pie">
             <div class="pie-izq">
               Ingeniería de Software 2 - Grupo 46
             </div>
             <div class="pie-der font-italic">
                 BAM © 2020
             </div>
         </footer>
       </div>   <!-- CIERRO ITEM3-->

    </div>   <!--CIERRO CONTAINER -->
  </body>
</html>
