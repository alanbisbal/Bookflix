@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-agregarAutor.css">

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>
          Agregar autor:
        </h3>
        @include('vistas-includes.cabecera-tarjeta')
      </div>
      <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <form action="{{'autoresCargados'}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          @error('nombre')
          @enderror
          <label for="nombre">{{'Nombre de Autor: '}}</label>
          <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
          @if($errors->has('nombre'))
            <div class="alert alert-danger" role="alert">
                Nombre no puede estar vacio</br>
            </div>
          @endif
          <input type="submit" class="btn btn-primary" value="Agregar">
        </form>
      </div>
    </div>
  </div>
@endsection
