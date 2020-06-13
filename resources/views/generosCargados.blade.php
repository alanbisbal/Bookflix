@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-generosCargados.css">
<link rel="stylesheet" href="css/estilos-elementos-cargados.css">


  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>
          Géneros cargados:
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
          @foreach($generos as $genero)
            <div class="elemento">
              <span> {{$genero->nombre}}</span>
              <div>
                <form action="{{ route('genero.eliminar', $genero->id )}}" class="d-inline" method="POST">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro que desea eliminar el genero?')">
                    Eliminar
                  </button>
                </form>
              </div>
              <div>
                <form>
                    <a href="{{route('genero.editar', $genero)}}"  class="btn btn-warning btn-sm">
                      Editar
                    </a>
                  </td>
                </form>
              </div>
            </div>
          @endforeach
        </div>
        <div class="boton">
          <a href="{{'administracion'}}" class="btn btn-info" role="button">
            Volver
          </a>
          <a href="{{'agregarGenero'}}" class="btn btn-info" role="button">
            Agregar género
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
