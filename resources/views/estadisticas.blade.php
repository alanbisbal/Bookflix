@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-estadisticas.css">

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>
          Estadísticas:
        </h3>
      </div>
      <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <div class="alert alert-success" role="alert">
          Cantidad de usuarios totales: {{$users->count()}}
        </div>
        <div class="alert alert-success" role="alert">
          Cantidad de usuarios entre 18 y 25 años: 
        </div>
        <div class="alert alert-success" role="alert">
          Cantidad de usuarios entre 25 y 33 años: 
        </div>
        <div class="alert alert-success" role="alert">
          Cantidad de usuarios entre 33 y 45 años: 
        </div>
        <div class="alert alert-success" role="alert">
          Cantidad de usuarios entre 45 y 55 años: 
        </div>
        <div class="alert alert-success" role="alert">
          Cantidad de usuarios entre 55 y 67 años: 
        </div>
        <div class="alert alert-success" role="alert">
          Cantidad de usuarios de 67 años para arriba: 
        </div>
        <div class="alert alert-success" role="alert">
          Cantidad de usuarios entre dos fechas...: 
        </div>
        <!--@foreach($users as $user)
          <div class="alert alert-success" role="alert">
            Nombre: {{$user->name}}</br>
            Apellido: {{$user->apellido}}</br>
          </div>
        @endforeach-->
        <a href="{{'administracion'}}" class="btn btn-info" role="button">
          Volver
        </a>
      </div>
    </div>
  </div>
@endsection