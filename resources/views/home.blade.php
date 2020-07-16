@extends('layouts.app')

@section('content')

<!--Owl carousel css-->
<link rel="stylesheet" href="/owl.carousel.min.css">
<link rel="stylesheet" href="/owl.theme.default.min.css">

<link rel="stylesheet" href="/css/estilos-home.css">



  <div class="col-md-7">
    <!--
    <div>
      <form action="{{'buscar'}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="text" name="busqueda" id="busqueda" value="{{ old('busqueda') }}">
        <input type="submit" class="btn btn-primary" value="Buscar">
      </form>
    </div>
    -->

    <div class="card card1">
      <div class="card-header">
        <h4>
          Más votados por el público
        </h4>
      </div>
      <div class="cb1">
        <div class="libros">
        @foreach($masvotados as $libro)
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
          Mejores calificados por el público
        </h4>
      </div>
      <div class="cb1">
        <div class="libros">
        @foreach($mejoresCalificados as $libro)
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
          Más leídos por el público
        </h4>
      </div>
      <div class="cb1">
        <div class="libros">
        @foreach($masleidos as $libro)
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
