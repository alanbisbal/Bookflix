@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-agregarPerfil.css">

  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3>
          Agregar perfil:
        </h3>
        @include('vistas-includes.cabecera-tarjeta')
      </div>
      <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <form action="{{'cargarPerfil'}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          @error('nombre')
          @enderror
          <div class="nombre">
            <span>
              {{'Nombre del perfil: '}}
            </span>
            <input type="text" name="nombre" id="nombre" value="">
          </div>
          @if($errors->has('nombre'))
            </br>
            <div class="alert alert-danger" role="alert">
              El nombre no puede estar vacio
            </div>
          @endif
          <div class="imagen">
            <span>
              {{'Imagen del perfil:'}}
            </span>
            <input accept="image/*" type="file" name="imagen" >
          </div>
          <div class="boton">
            <a href="{{url('/librosCargados')}}" class="btn btn-info" role="button">
              Volver
            </a>
            <input type="submit" class="btn btn-info"value="Agregar">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
