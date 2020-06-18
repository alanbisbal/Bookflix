@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Bienvenido {{auth()->user()->name}}
                    </h3>
                    @if (auth()->user()->es_admin)
                        <a class="nav-link" style="display:flex; align-content: center;"href="{{route('administracion')}}">
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
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                    Comentarios de {{$libro->titulo}}
                    </br>
                    @if(0)
                        {{'Todavía no posee ningun comentario.'}}
                    @else
                        @foreach($libro->capitulos as $capitulo)
                            <form action="{{ route('capitulo.update', $capitulo->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                </br>
                                <input type="text" name="titulo" placeholder="titulo" class="form-control mb-2" value="{{ $capitulo->titulo }}">
                                <div class="col-md-6">
                                    <button class="btn btn-warning btn-block" type="submit">
                                        Editar
                                    </button>
                                    <button class="btn btn-warning btn-block" href="{{route('administracion')}}">
                                        Cancelar
                                    </button>
                                </div>
                            </form>
                            </br>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection