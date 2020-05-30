@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-editorialesCargados.css">
<link rel="stylesheet" href="css/estilos-elementos-cargados.css">

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>
          Editoriales cargadas:
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
          @foreach($editoriales as $editorial)
            <div class="elemento">
              <span> {{$editorial->nombre}}</span>
              <div>
                <form action="{{ route('editorial.eliminar', $editorial->id )}}" class="d-inline" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
              </div>
              <div>
                <form>
                    <a href="{{route('editorial.editar', $editorial->id)}}" class="btn btn-warning btn-sm">
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
          <a href="{{'agregarEditorial'}}" class="btn btn-info" role="button">
            Agregar editorial
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
