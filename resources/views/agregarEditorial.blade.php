@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-agregarEditorial.css">

  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3>
          Agregar editorial:
        </h3>
        @include('vistas-includes.cabecera-tarjeta')
      </div>
      <div class="card-body">
        @foreach($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            {{$error}}
          </div>
        @endforeach
        <form action="{{'editorialesCargados'}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="p1">
            <label for="nombre">{{'Nombre: '}}</label>
            <input class="col-md-10" type="text" name="nombre" id="nombre" value="">
          </div>  
          <div class="p2">
            <a href="{{url('/editorialesCargados')}}" class="btn btn-info" role="button">
              Volver
            </a>
            <input type="submit" class="btn btn-info" value="Agregar">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
