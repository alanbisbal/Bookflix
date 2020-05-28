@extends('layouts.app')

<link rel="stylesheet" href="css/estilos-editarNovedad.css">

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>
                    Editar novedad:
                </h3>
                @include('vistas-includes.cabecera-tarjeta')
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
                    <button class="btn btn-warning btn-block" type="submit">
                        Editar novedad
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
