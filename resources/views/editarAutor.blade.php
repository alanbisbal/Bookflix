@extends('layouts.app')

<link rel="stylesheet" href="css/estilos-editarAutor.css">

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Editar autor:
                    </h3>
                    @include('vistas-includes.cabecera-tarjeta')
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Editar autor</h1>
                    @if (session('mensaje'))
                        <div class="alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <form action="{{ route('autor.update', $autor->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        @error('nombre')
                            <div class="alert alert-danger">
                                El nombre es obligatorio
                            </div>
                        @enderror
                        <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $autor->nombre }}">
                        <button class="btn btn-warning btn-block" type="submit">
                            Editar autor
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
