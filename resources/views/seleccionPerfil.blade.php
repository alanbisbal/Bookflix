@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-seleccionPerfil.css">

  <div class="col-md-8 ">
    <div class="card">
      <div class="card-header">  
        <h3 class="text-center">Seleccioná tu perfil</h3>
      </div>
    <div class="card-body">
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif
      @foreach($perfiles as $perfil)
        <div class="d-inline-block">
          <a class="perfiles" href="{{ route('activarPerfil',$perfil->id) }}">
            @if(!empty($perfil->imagen))
              <img src="{{asset('storage').'/'.$perfil->imagen}}" alt="100% "width="100%" >
            @else
              <img src="imagenes/perfil.jpg" alt="100% "width="100%">
            @endif
            <h4>{{ $perfil->nombre }}</h4>
          </a>
        </div>
      @endforeach
      @if ($cant>0)
        <div class="d-inline-block">
          <a class="perfiles" href="{{route('nuevoPerfil')}}">
            <img src="/imagenes/perfil.jpg"  alt="100%" width="100%">
            <h4>Nuevo perfil</h4> 
          </a>
        </div>
      @endif
    </div>
  </div>
@endsection
