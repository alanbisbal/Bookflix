@extends('layouts.app')

<!-- NO ME CARGA NADA DE LAYOUTS.APP -->

@section('content')

<link rel="stylesheet" href="/css/estilos-home.css">

  <div class="col-md-8">
    <div class="card card1">
      <div class="card-header">
        <h4>
          Más leídos por el público
        </h4>
      </div>
      <div class="cb1">
        <div class="libros">
        @foreach($nuevos as $libro)
          @if($libro->visible)
            <div class="libro">
              <a  href="{{route('libro.trailer',$libro->id)}}">
                <div class="imagen">
                  <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100" width="100">
                </div>
                <b><i>{{($libro->titulo)}}</i></b>
              </a>
            </div>
          @endif
        @endforeach
      </div>
      </div>
    </div>
    <div class="card card1">
      <div class="card-header">
        <h4>
          Nuevos lanzamientos
        </h4>
      </div>
      <div class="cb1">
        <div class="libros">
        @foreach($nuevos as $libro)
          @if($libro->visible)
            <div class="libro">
              <a  href="{{route('libro.trailer',$libro->id)}}">
                <div class="imagen">
                  <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100" width="100">
                </div>
                <b><i>{{($libro->titulo)}}</i></b>
              </a>
            </div>
          @endif
        @endforeach
      </div>
      </div>
    </div>

  </div>
  <div class="col-md-3">
    @include('vistas-includes.seccion-noticias') 
  </div>
@endsection
