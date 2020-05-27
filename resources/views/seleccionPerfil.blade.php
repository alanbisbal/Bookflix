@extends('layouts.app')

<link rel="stylesheet" href="css/estilos-seleccionPerfil.css">

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8 ">
    <div class="card">
      <div class="card-header">
        <!--  Bienvenido {{auth()->user()->name}}
        @if (auth()->user()->es_admin)
                <p>(Administrador)</p>
                <a class="btn-link" href="{{route('administracion')}}">Tareas administrativas</a>
        @endif -->
        <h5 class="text-center">Seleccioná tu perfil</h5>
      </div>
    <div class="card-body">
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif
      @foreach($perfiles as $perfil)
        <div class="d-inline-block">
          <a class="perfiles" href="{{ ('/home'.'/'.$perfil->id) }}">
            @if(!empty($perfil->imagen))
              <img src="{{asset('storage').'/'.$perfil->imagen}}" alt="100% "width="100%" >
            @else
              <img src="imagenes/perfil.jpg" alt="100% "width="100%">
            @endif
            <h4>{{ $perfil->nombre }}</h4>
          </a>
        </div>
      @endforeach
      @for ($i = 0; $i < $cant; $i++)
        <div class="d-inline-block">
          <a class="perfiles" href="{{route('nuevoPerfil')}}">
            <img src="/imagenes/perfil.jpg"  alt="100%" width="100%">
            <h4>Nuevo perfil</h4> 
          </a>
        </div>
      @endfor
    </div>
  </div>
</div>
@endsection
