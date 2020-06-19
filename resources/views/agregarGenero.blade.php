@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-agregarGenero.css">

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>Agregar género:</h3>
        @include('vistas-includes.cabecera-tarjeta')
      </div>
      <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        @foreach($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            {{$error}}
          </div>
        @endforeach
        <div class="form-group row">
          <form action="{{'generosCargados'}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <label for="nombre">{{'Agregar Genero:'}}</label>
            <input type="text" name="nombre" id="nombre" value="">
            <input type="submit" class="btn btn-primary" value="Agregar">
            <a href="{{url('/generosCargados')}}" class="btn btn-info" role="button">
              Volver
            </a>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
