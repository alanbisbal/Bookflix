@extends('layouts.app')

@section('content')
<div class="menu">
    <div class="background-overlay">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Bienvenido {{auth()->user()->name}}
                        @if (auth()->user()->es_admin)
                            <a class="nav-link" href="{{route('administracion')}}">
                                Tareas administrativas
                            </a>
                        @endif
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
    </div>
</div>
@endsection
