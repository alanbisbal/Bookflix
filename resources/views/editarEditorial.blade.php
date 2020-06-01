@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-editarEditorial.css">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>
                    Editar editorial:
                </h3>
                @include('vistas-includes.cabecera-tarjeta')
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('mensaje'))
                    <div class="alert alert-success">
                        {{ session('mensaje') }}
                    </div>
                @endif
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endforeach
                <form action="{{ route('editorial.update', $editorial->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $editorial->nombre }}">
                    <button class="btn btn-warning btn-block" type="submit">
                        Editar editorial
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
