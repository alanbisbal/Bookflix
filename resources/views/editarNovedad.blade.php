@extends('plantilla')

@section('seccion')
<div class="container">
    <a class="navbar-brand" href="{{ url('/home') }}">
        Bookflix
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
</div>
  <h1>Editar novedad</h1>
  @if (session('mensaje'))
      <div class="alert alert-success">
          {{ session('mensaje') }}
      </div>
  @endif
  <form action="{{ route('novedad.update', $novedad->id) }}" method="POST">
    @method('PUT')
    @csrf

    @error('nombre')
        <div class="alert alert-danger">
            El nombre es obligatorio
        </div>
    @enderror

Titulo:
    <input type="text" name="titulo" placeholder="titulo" class="form-control mb-2" value="{{ $novedad->titulo }}">
Descripcion:
    <input type="text" name="desc" placeholder="desc" class="form-control mb-2" value="{{ $novedad->desc }}">
    <button class="btn btn-warning btn-block" type="submit">Editar</button>
  </form>
@endsection
