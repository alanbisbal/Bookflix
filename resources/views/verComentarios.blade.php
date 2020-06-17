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
                    Comentarios de {{$libro->titulo}}
                    </br>
                    @if(0)
                        {{'Todavia no posee ningun comentario.'}}
                    @else
                        @foreach($libro->comentarios as $comentario)
                            <div>
                                <div>
                                    {{$comentario->perfil->nombre}}
                                    </br>
                                    {{$comentario->created_at}}
                                    </br>
                                    <textarea rows="5" cols="50" disabled="yes" >
                                        {{$comentario->desc}}
                                    </textarea>
                                    </br>
                                    <form action="{{ route('comentario.eliminar' )}}" class="d-inline" method="POST">
                                        @csrf
                                        <input type="hidden" name="idComentario" value="{{$comentario->id}}">
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro que desea eliminar la novedad?')">
                                            Eliminar
                                        </button>
                                    </form>
                                    </br>
                                </div>
                            </div>
                            -----------------------------------------------------
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection