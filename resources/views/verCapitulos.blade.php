@extends('layouts.app')

@section('content')

    <div class="col-md-8">
        <div class="card">
            <div class="card-header" style="display:flex; justify-content: space-between;">
                <h3 style="display:flex">
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
                Capitulos de {{$libro->titulo}}
                </br>
                @foreach($libro->capitulos as $capitulo)
                <form action="{{ route('capitulo.update', $capitulo->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <label for="titulo">{{'Titulo del capitulo '}}</label>
                    <input type="text" name="titulo" id="titulo" value="{{ $capitulo->titulo }}">
                    </br>
                    <label for="capitulo">
                        <a href="{{asset('storage').'/'.$capitulo->capitulo}}">
                            capitulo {{$capitulo->nro}}
                        </a>
                    </label>
                    <input accept="application/pdf" type="file" name="capitulo" id="capitulo" value="{{ asset('storage').'/'.$capitulo->capitulo }}">
                    <div class="col-md-6">
                        <button class="btn btn-warning btn-block" type="submit">
                            Editar
                        </button>
                        <button class="btn btn-warning btn-block" href="{{route('administracion')}}">
                            Cancelar
                        </button>
                    </div>
                </form>
                </br>-----------------------------------------------------</br>
                @endforeach
            </div>
        </div>
    </div>
    
@endsection