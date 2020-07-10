<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/imagenes/LogoBookflix.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="stylesheet" type="text/css" href="/css/estilos-app.css">
    
</head>
<body>
  
  <div class="vermas1">
    <!-- esto es del script2 
    <p>
      <a id="boton1" href="javascript:mostrar2('contenedor1', 'boton1')">
        Ver Mas
      </a>
    </p>
    <div id="contenedor1" style="display:none;">
      {{$libro->desc}}
      <a  href="javascript:cerrar2('contenedor1', 'boton1')">
        Cerrar
      </a>
    </div>
  </div>
  <div class="vermas2">
    <p>
      <a id="boton2" href="javascript:mostrar2('contenedor2', 'boton2')">
        Ver Mas
      </a>
    </p>
    <div id="contenedor2" style="display:none;">
      {{$libro->desc}}
      <a  href="javascript:cerrar2('contenedor2', 'boton2')">
        Cerrar
      </a>
    </div>
  </div>
  <script>
    function mostrar2(contenedor, boton) {
      div = document.getElementById(contenedor);
      div.style.display = '';
      a = document.getElementById(boton);
      a.style.display = 'none';
    }
    function cerrar2(contenedor, boton) {
      div = document.getElementById(contenedor);
      div.style.display = 'none';
      a = document.getElementById(boton);
      a.style.display = '';
    }
  </script>
   esto es del script2 -->
  <!-- 
<a id="abrir-1" href="javascript:mostrar('contenedor1', 'abrir-1')">Ver Mas</a>
<a  href="javascript:cerrar('contenedor1', 'abrir-1')">Cerrar</a>
 -->
<!-- Parte del "Ver más" -->
  <script languague="javascript">
    function mostrar() {
      div = document.getElementById('flotante');
      a = document.getElementById('abrir');
      a.style.display = 'none';
      div.style.display = '';
    }
    function cerrar() {
      div = document.getElementById('flotante');
      div.style.display = 'none';
      a = document.getElementById('abrir');
      a.style.display = '';
    }
  </script>



  <!-- Parte del "Ver más" -->
  <!-- Parte del "Confirmar cerrar sesión" -->
  <script>
    function CerrarSesion()
    {
      var x = confirm("¿Desea cerrar sesion?");
      if (x)
        return true;
      else
        return false;
    }
  </script>
  <!-- Parte del "Confirmar cerrar sesión" -->
  <div id="app" class="container">
    <header class="header">
      @include('vistas-includes.navegador')
    </header>
    <main>
      <div class="menu">
        <div class="background-overlay">
          <div class="row justify-content-center">
            @yield('content')
          </div>
        </div>
      </div>
    </main>
    <footer class="pie">
      @include('vistas-includes.pie')
    </footer>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  <!--Owl carousel script-->
  <script src="/jquery.min.js"></script>
  <script src="/owl.carousel.min.js"></script>

  <script>
    $(document).ready(function(){
      $(".owl-carousel").owlCarousel(
        {
          loop:true,
          margin:10,
          nav:true,
        }
      );
    });
  </script>

</body>
</html>
