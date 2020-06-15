<nav class="navbar navbar-expand-lg navbar-fixed">
    @auth
      @if(auth()->user()->es_admin)
        <a class="navbar-brand" href="{{ route('administracion') }}">
          <img src="/imagenes/bookflixnegro.png" style="width: 100%">
        </a>
      @else
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="/imagenes/bookflixnegro.png" style="width: 100%">
        </a>
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
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <button class="dropdown-item" href="{{ route('logout') }}" onclick="if(CerrarSesion()){event.preventDefault(); document.getElementById('logout-form').submit();}">
                {{ __('Cerrar sesión') }}
            </button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a class="dropdown-item" href="{{ route('verCuenta') }}">
                {{ __('Ver Cuenta') }}
            </a>
            <form id="verCuenta" action="{{ route('verCuenta') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </li>
      @endguest
    </ul>
  </nav>