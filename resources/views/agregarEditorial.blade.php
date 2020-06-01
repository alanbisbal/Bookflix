@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-agregarEditorial.css">

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>
          Agregar editorial:
        </h3>
        @include('vistas-includes.cabecera-tarjeta')
      </div>
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{$error}}
        </div>
      @endforeach
      <form action="{{'editorialesCargados'}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <label for="nombre">{{'Nombre: '}}</label>
        <input type="text" name="nombre" id="nombre" value="">
        <input type="submit" class="btn btn-primary" value="Agregar">
      </form>
    </div>
  </div>
@endsection
