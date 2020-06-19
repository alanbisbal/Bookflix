@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/css/estilos-verCapitulos.css">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header" style="display:flex; justify-content: space-between;">
                <h3>
                    Capítulos del libro: <i>{{$libro->titulo}}</i>
                </h3>
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
                @foreach($libro->capitulos as $capitulo)
                <form action="{{ route('capitulo.update', $capitulo->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <label for="titulo">{{'Título del capítulo: '}}</label>
                    <input type="text" name="titulo" id="titulo" value="{{ $capitulo->titulo }}">
                    <label for="capitulo">
                        <a href="{{asset('storage').'/'.$capitulo->capitulo}}">
                            PDF del capítulo {{$capitulo->nro}}
                        </a>
                    </label>
                    <input accept="application/pdf" type="file" name="capitulo" id="capitulo" value="{{ asset('storage').'/'.$capitulo->capitulo }}">
                    <div class="col-md-6">
                        <button class="btn btn-warning btn-block" type="submit">
                            Editar
                        </button>
                        
                    </div>
                </form>
                @endforeach
                <a href="{{url('/librosCargados')}}" class="btn btn-info" role="button">
                    Volver
                </a>
            </div>
        </div>
    </div>

@endsection