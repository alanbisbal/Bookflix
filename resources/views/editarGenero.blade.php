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
  <h1>Editar genero</h1>
  @if (session('mensaje'))
      <div class="alert alert-success">
          {{ session('mensaje') }}
      </div>
  @endif
  
  <form action="{{ route('genero.update', $genero->id) }}" method="POST">
    @method('PUT')
    @csrf

    @error('nombre')
        <div class="alert alert-danger">
            El nombre es obligatorio
        </div>
    @enderror



    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $genero->nombre }}">
    <button class="btn btn-warning btn-block" type="submit">Editar</button>
  </form>
@endsection
