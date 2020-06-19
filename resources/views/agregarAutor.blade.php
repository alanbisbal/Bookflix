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
        @foreach($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            {{$error}}
          </div>
        @endforeach
        <form action="{{'autoresCargados'}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <label for="nombre">{{'Nombre completo del Autor:'}}</label>
          <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
          <input type="submit" class="btn btn-primary" value="Agregar">
          <a href="{{url('/autoresCargados')}}" class="btn btn-info" role="button">
            Volver
          </a>
        </form>
      </div>
    </div>
  </div>
@endsection
