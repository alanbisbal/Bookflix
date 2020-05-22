@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="card">
                <div class="card-header" > Bienvenido {{auth()->user()->name}}
                  @if (auth()->user()->es_admin)
                     <p>(Administrador)</p>
                    <a class="nav-link" href="{{route('administracion')}}">Tareas administrativas</a>
                  @endif
                 </div>
                <div class="card-body" align="center"  >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                      @foreach($perfiles as $perfil)
                      <div class="d-inline-block" style="width: 200px; height: 150px;" >
                      <a href="{{ ('/home'.'/'.$perfil->id) }}">
                        @if(!empty($perfil->imagen))
                        <img src="{{asset('storage').'/'.$perfil->imagen}}" alt="100% "width="100%" >
                        @else
                          <img src="imagenes/perfil.jpg" alt="100% "width="100%" >
                        @endif</br>
                        {{ $perfil->nombre }}
                        </a>
                      </br>
                      </div>
                      @endforeach


                      @for ($i = 0; $i < $cant; $i++)
                        <div class="d-inline-block" style="width: 200px; height: 150px;">
                          <a href="{{route('nuevoPerfil')}}">
                        <img src="/imagenes/perfil.jpg"  alt="100% "width="100%"></br>
                        Nuevo perfil </a>
                        </br>
                        </div>
                      @endfor

                </div>
            </div>


    </div>

</div>

@endsection
