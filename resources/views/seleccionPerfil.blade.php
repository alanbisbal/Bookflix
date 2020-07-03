@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/css/estilos-seleccionPerfil.css">

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="text-center">
          Seleccioná tu perfil
        </h3>
      </div>
      @if(Session::has('alertas'))
          <div class="alert alert-success" role="alert">
              {{ Session::get('alertas') }}
          </div>
      @endif
    <div class="card-body">
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif

      @foreach($perfiles as $perfil)
        <div class="d-inline-block">
          @if($perfil->estado)
          <a class="perfiles" href="{{ route('perfilActivo',$perfil->id) }}">

          @endif
            @if(!empty($perfil->imagen))
              <div class="imagen">
                <img src="{{asset('storage').'/'.$perfil->imagen}}" alt="100% "width="100%" >
              </div>
            @else
              <div class="imagen">
                <img src="imagenes/perfil.jpg" alt="100% "width="100%">
              </div>
            @endif
            <h4>
              {{ $perfil->nombre }}
            </h4>
            <div class="boton">
              <a href="{{route('editarPerfil',$perfil->id)}}" class="btn btn-warning" role="button">
                Editar perfil
              </a>
            </div>

          </a>
        </div>
      @endforeach
      @if (count($perfiles)<$cant)
        <div class="d-inline-block">
          <a class="perfiles" href="{{route('nuevoPerfil')}}">
            <img src="/imagenes/perfil.jpg"  alt="100%" width="100%">
            <h4>
              Nuevo perfil
            </h4>
          </a>
        </div>
      @endif
    </div>
  </div>
@endsection
