@extends('layouts.app')

<link rel="stylesheet" href="css/estilos-agregarEditorial.css">

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3>
            Bienvenido {{auth()->user()->name}}
          </h3>
          @if (auth()->user()->es_admin)
            <a class="nav-link" href="{{route('administracion')}}">
              Tareas administrativas
            </a>
          @endif
        </div>
        AgregarEditorial
        <form action="{{'editorialesCargados'}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          @error('nombre')
          @enderror
          <label for="nombre">{{'Nombre: '}}</label>
          <input type="text" name="nombre" id="nombre" value="">
          @if($errors->has('nombre'))
            Nombre no puede estar vacio
          @endif
          <input type="submit" class="btn btn-primary" value="Agregar">
        </form>
      </div>
    </div>
  </div>
@endsection
