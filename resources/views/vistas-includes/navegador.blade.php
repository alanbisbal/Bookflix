<nav class="navbar navbar-expand-lg navbar-fixed">
    @auth
      @if(auth()->user()->es_admin)
        <a class="navbar-brand" href="{{ route('administracion') }}">
          <img src="/imagenes/bookflixnegro.png" style="width: 100%">
        </a>
        <!--
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('administracion') }}">
              <span class="alinear">
                Menú
              </span>
            </a>
          </li>
        </ul>
        -->  
      @else
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="/imagenes/bookflixnegro.png" style="width: 100%">
        </a>
        <!--
        <ul class="navbar-nav" >
          <li class="nav-item">
            <a class="nav-link" href="{{ route('seleccionPerfil') }}">
              <span class="alinear">
                Cambiar Perfil
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('verFavoritos') }}">
              <span class="alinear">
                Ver Favoritos
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('verLeidos') }}">
              <span class="alinear">
                Ver Leidos
              </span>
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('verCatalogo') }}">
                <span class="alinear">
                  Ver Catalogo
                </span>
              </a>
          </li> 
        </ul>   -->  
        <ul class="navbar-nav" >
          <li class="nav-item">
            <a class="nav-link" href="{{ route('verCatalogo') }}">
              <span class="alinear">
                Catálogo
              </span>
            </a>
          </li>     
          <li class="nav-item">
            <a class="nav-link" href="{{ route('verFavoritos') }}">
              <span class="alinear">
                Mis favoritos
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('verLeidos') }}">
              <span class="alinear">
                Libros leídos
              </span>
            </a>
          </li>
        </ul>
      @endif
      @else
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="/imagenes/bookflixnegro.png" style="width: 100%">
        </a>
    @endauth
    <ul class="navbar-nav">
      @guest
        <li class="nav-item">
          <a class="nav-link " href="/">
            <span class="alinear">{{ __('Inicio') }}
            </span>
          </a>
        </li>
      @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <span class="caret">
              Menú
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('seleccionPerfil') }}">
              {{ __('Perfiles') }}
            </a>
            <form id="seleccionPerfil" action="{{ route('seleccionPerfil') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a class="dropdown-item" href="{{ route('verCuenta') }}">
                {{ __('Mi cuenta') }}
            </a>
            <form id="verCuenta" action="{{ route('verCuenta') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <div class="dropdown-divider"></div>
            <button class="dropdown-item" href="{{ route('logout') }}" onclick="if(CerrarSesion()){event.preventDefault(); document.getElementById('logout-form').submit();}">
              {{ __('Cerrar sesión') }}
            </button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </li>
      @endguest
    </ul>
  </nav>