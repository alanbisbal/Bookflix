@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-librosCargados.css">
<link rel="stylesheet" href="css/estilos-elementos-cargados.css">

  <div class="col-md-10">
    <div class="card">
      <div class="card-header"> 
        <h3>
          Libros cargados:
        </h3>
        @include('vistas-includes.cabecera-tarjeta')
      </div>
      <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <div class="encabezado">
          <span class="titulo">ISBN</span>
          <span class="titulo">Título</span>
          <span class="titulo">Portada</span>
          <span class="titulo">Editorial</span>
          <span class="titulo">Autor</span>
          <span class="titulo">Género</span>
          <span></span>
          <span></span>
        </div>
        <div class="cuerpo">
          @foreach($libros as $libro)
            <div class="elemento">
              <span>{{$libro->isbn}}</span>
              <div>
                <!--<a href="{{asset('storage').'/'.$libro->pdf}}">
                  {{$libro->titulo}}
                </a>-->
                <span> {{$libro->titulo}}</span>
              </div>
              <img src="{{asset('storage').'/'.$libro->img_libro}}"alt="" width="100"> 
              <span>{{$libro->editorialL->nombre}}</span>
              <span>{{$libro->autorL->nombre}}</span>
              <span>{{$libro->generoL->nombre}}</span>
              <div>
                <form action="{{ route('libro.eliminar', $libro->id )}}" class="d-inline" method="POST">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger btn-sm" onclick="return confirm('¿Esta seguro que desea eliminar el libro?')">
                    Eliminar
                  </button>
                </form>
              </div>
              <div>
                <form>
                    <a href="{{route('libro.editar', $libro)}}" class="btn btn-warning btn-sm">
                      Editar libro
                    </a>
                </form>
              </div>
            </div>
          @endforeach
        </div>
        <div class="boton">
          <a href="{{'administracion'}}" class="btn btn-info" role="button">
            Volver
          </a>
          <a href="{{'agregarLibro'}}" class="btn btn-info" role="button">
            Agregar libro
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
