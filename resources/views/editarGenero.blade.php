@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-editarGenero.css">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>
                    Editar género:
                </h3>
                @include('vistas-includes.cabecera-tarjeta')
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h1>Editar genero</h1>
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endforeach
                @if (session('mensaje'))
                    <div class="alert alert-success">
                        {{ session('mensaje') }}
                    </div>
                @endif
                <form action="{{ route('genero.update', $genero->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $genero->nombre }}">
                    <button class="btn btn-info" type="submit">
                        Editar género
                    </button>
                </form>
                <a href="{{url('/generosCargados')}}" class="btn btn-info" role="button">
                    Volver
                </a>
            </div>
        </div>
    </div>
@endsection
