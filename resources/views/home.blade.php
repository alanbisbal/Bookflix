@extends('layouts.app')

<!-- NO ME CARGA NADA DE LAYOUTS.APP -->

@section('content')

<link rel="stylesheet" href="/css/estilos-home.css">
  <div class="col-md-8">
     <div class="card">
      <div class="card-header">
        <h3>Bienvenido {{$perfilActivo->nombre}}</h3>
        @include('vistas-includes.cabecera-tarjeta')
      </div>
      <div class="tarjetasanidadas">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <div class="card-body">
          @foreach($libros as $libro)
            <div class="card-header" >
              <a class="libros" href="{{asset('storage').'/'.$libro->pdf}}">
                {{$libro->titulo}}
                <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100" width="100">
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    @include('vistas-includes.seccion-noticias') 
  </div>
@endsection
