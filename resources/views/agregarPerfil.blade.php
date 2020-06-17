@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-agregarPerfil.css">

  <div class="col-md-8">
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
          <label for="nombre">
            {{'Nombre de perfil: '}}
          </label>
          <input type="text" name="nombre" id="nombre" class="form-control" value="">
          @if($errors->has('nombre'))
            <div class="alert alert-danger" role="alert">
              El nombre no puede estar vacio
            </div>
          @endif
          <div class="form-control">
            <label for="imagen" >
              {{'Imagen de perfil'}}
            </label>
          </div>
          <input accept="image/*" type="file" name="imagen" >
          </br>
          </br>
          <div class="col-md-6">
            <input type="submit" class="form-control"value="Agregar">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
