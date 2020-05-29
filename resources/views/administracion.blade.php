@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="css/estilos-administracion.css">

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>
          Bienvenido {{auth()->user()->name}}
        </h3>
        @include('vistas-includes.cabecera-tarjeta')
      </div>
      <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <div>
          <a href="{{'librosCargados'}}" class="btn btn-info" role="button">
            Ver libros
          </a>
        </div>
        <div>
          <a href="{{'novedadesCargados'}}" class="btn btn-info" role="button" >
            Ver novedades
          </a>
        </div>
        <div>
          <a href="{{'autoresCargados'}}" class="btn btn-info" role="button">
            Ver autores
          </a>
        </div>
        <div>
          <a href="{{'editorialesCargados'}}" class="btn btn-info" role="button">
            Ver editoriales
          </a>
        </div>
        <div>
          <a href="{{'generosCargados'}}" class="btn btn-info" role="button">
            Ver generos
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
