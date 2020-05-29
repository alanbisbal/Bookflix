@extends('layouts.app')

<!-- PREGUNTAR POR EL ALINEADO DE LOS BOTONES DE "ELIMINAR" -->

@section('content')

<link rel="stylesheet" href="css/estilos-novedadesCargados.css">
<link rel="stylesheet" href="css/estilos-elementos-cargados.css">


  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>
          Novedades cargadas:
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
          <span class="titulo">Título</span>
          <span class="titulo">Descripción</span>
          <span></span>
          <span></span>
        </div>
        <div class="cuerpo">
          @foreach($novedades as $novedad)              
            <div class="elemento">
              <span> {{$novedad->titulo}}</span>
              <span> {{$novedad->desc}}</span>
              <div>
                <form action="{{ route('novedad.eliminar', $novedad->id )}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm">
                    Eliminar
                  </button>
                </form>
              </div>
              <div>
                <form>
                  <a href="{{route('novedad.editar', $novedad)}}" class="btn btn-warning btn-sm">
                    Editar novedad
                  </a>
                </form>
              </div>
            </div>
          @endforeach      
        </div>
        <div class="boton">
          <a href="{{'agregarNovedad'}}" class="btn btn-info" role="button">
            Agregar novedad
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
