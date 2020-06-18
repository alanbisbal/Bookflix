@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/css/estilos-verComentarios.css">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>
                    Comentarios del libro: <i>{{$libro->titulo}}</i>
                </h3>
                <h3>
                    Cantidad: {{$libro->comentarios->count()}}
                </h3>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if(0)
                    {{'Todavía no posee ningun comentario.'}}
                @else
                    @foreach($libro->comentarios as $comentario)
                        <div>
                            <div class="titulo">
                                <h5>
                                    Hecho por el perfil <b>{{$comentario->perfil->nombre}}</b> el <b>{{$comentario->created_at}}</b>
                                </h5>
                            </div>
                            <div class="texto">
                                <textarea rows="4" cols="100" disabled="yes" >
                                    {{$comentario->desc}}
                                </textarea>
                            </div>
                            <div class="boton">
                                <form action="{{ route('comentario.eliminar' )}}" class="d-inline" method="POST">
                                    @csrf
                                    <input type="hidden" name="idComentario" value="{{$comentario->id}}">
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro que desea eliminar la novedad?')">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection