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
        .item1{
          width: 100%;
          height: 100%;
          align-items: stretch;
          grid-area: 1/1/2/-1; /*iniFila,iniCol,finFila,finCol*/
        }
        .item2{
          background: url(/imagenes/biblioteca.jpg);
          background-size: cover;
          position: relative;
        }
        .item2 > div.background-overlay{
          display: grid;
          grid-template-columns: 1fr 1fr;
          width: 100%;
          height: 100%;
        }
        @media(max-width:800px){
          .item2 > div.background-overlay{
            grid-template-columns: 1fr;
            grid-template-rows: 30% 70%;
          }
        }
        .item3{
          grid-area: 3/1/4/-1;
          width: 100%;
          height: 100%;
          align-items: stretch;
          background: green;
        }
        /* HEADER */
        .navbar{
          height: 100%;
          width: 100%;
          background: black;
          align-self: center;
          justify-content: space-between;
          flex-wrap: nowrap;
        }
        .navbar-nav{
          flex-direction: row;
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
        }
        /* MENU ENTERO (MAIN Y ASIDE) */
        .menu{
          text-align: center;
          justify-content: center;
          margin-top: 10%;
        }
        .barra{
          width: 100%;
          height: 100%;
        }
        .background-overlay{
          background: rgba(170, 96, 96, .4);
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          position: absolute;
          display: flex;
        }
        .card{
          margin: 8%;
          height: 60%;
          width: 70%;
          background: white;
          border-style: solid;
          border-bottom:  10px;
          border-top: 10px;
          border-left: 10px;
          border-right: 10px;
          overflow: hidden;
        }
        .card-header{
          background-color: #383232;
          width: 100%;
          color: white;
        }
        .tarjetasanidadas{
          overflow-y: scroll;
          max-height: 650px;
        }
        .tarjetasanidada-una{
          border-style: solid;
          border-radius: 0px;
          border-top: 10px;
          border-left: 10px;
          border-right: 10px;
          border-bottom: 10px;
        }
        .card-body{
          height: 110px;
          background-color: white;
          border-bottom: gray 2px solid;
        }
        /* PIE */
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
        </style>

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
