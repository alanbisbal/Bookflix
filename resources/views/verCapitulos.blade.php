@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/css/estilos-verCapitulos.css">

    <div class="col-md-11">
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
                    <label class="titcap" for="titulo">{{'Título del capítulo: '}}</label>
                    <input class="input-titcap" type="text" name="titulo" id="titulo" value="{{ $capitulo->titulo }}">
                    <label class="label-cap" for="capitulo">
                        <a href="{{asset('storage').'/'.$capitulo->capitulo}}">
                            PDF del capítulo {{$capitulo->nro}}
                        </a>
                    </label>
                    <input accept="application/pdf" type="file" name="capitulo" id="capitulo" value="{{ asset('storage').'/'.$capitulo->capitulo }}">
                    <button class="boton-editar btn btn-info" type="submit">
                        Editar
                    </button>
                </form>
                @endforeach
                <a href="{{url('/librosCargados')}}" class="btn btn-info" role="button">
                    Volver
                </a>
            </div>
        </div>
    </div>

@endsection