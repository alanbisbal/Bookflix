@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/estilos-autoresCargados.css">
<link rel="stylesheet" href="css/estilos-elementos-cargados.css">


  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>
          Autores cargados:
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
          <span class="titulo">Nombre</span>
          <span></span>
          <span></span>
        </div>
        <div class="cuerpo">
          @foreach($autores as $autor)
            <div class="elemento">
              <span>
                {{$autor->nombre}}
              </span>
              <div>
                <form action="{{ route('autor.eliminar', $autor->id )}}" class="d-inline" method="POST">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro? Se eliminará el autor junto a todos los libros que sean de este autor')">
                    Eliminar
                  </button>
                </form>
              </div>
              <div>
                <form>
                    <a href="{{route('autor.editar', $autor->id)}}" class="btn btn-warning btn-sm">
                      Editar
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
          <a href="{{'agregarAutor'}}" class="btn btn-info" role="button">
            Agregar autor
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
