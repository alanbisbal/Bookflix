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
        <div class="elem">
          <a href="{{'librosCargados'}}" class="btn btn-info" role="button">
            Libros
          </a>
        </div>
        <div class="elem">
          <a href="{{'autoresCargados'}}" class="btn btn-info" role="button">
            Autores
          </a>
        </div>
        <div class="elem">
          <a href="{{'editorialesCargados'}}" class="btn btn-info" role="button">
            Editoriales
          </a>
        </div>
        <div class="elem">
          <a href="{{'generosCargados'}}" class="btn btn-info" role="button">
            Géneros
          </a>
        </div>
        <div class="elem">
          <a href="{{'novedadesCargados'}}" class="btn btn-info" role="button" >
            Novedades
          </a>
        </div>
        <div class="elem">
          <a href="{{ route('admin.estadisticas') }}" class="btn btn-info" role="button">
            Estadísticas
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
