@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Bienvenido {{auth()->user()->name}}
                  @if (auth()->user()->es_admin)
                     <p>(Administrador)</p>
                    <a class="nav-link" href="{{route('administracion')}}">Tareas administrativas</a>
                  @endif
                 </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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


              </div>
          </div>
      </div>
  </div>
@endsection
