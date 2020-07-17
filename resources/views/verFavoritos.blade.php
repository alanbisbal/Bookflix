@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/estilos-verFavoritos.css">

    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h3>
                    Mis libros favoritos:
                </h3>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if(count($favoritos)==0)
                    <h5>
                        <i>{{'Tu lista de favoritos esta vacía.'}}</i>
                    </h5>
                @else
                    <div class="favoritos">
                        @foreach($favoritos as $favorito)
                            @if($favorito->libro->visible)
                                <div class="libro">
                                    <div class="arriba">
                                        <a class="libros" href="{{route('libro.trailer',$favorito->libro->id)}}">
                                            <div class="imagen">
                                                <img src="{{asset('storage').'/'.$favorito->libro->img_libro}}" alt="100" width="100">
                                            </div>
                                            <i>{{($favorito->libro->titulo)}}</i>   
                                        </a>
                                    </div>
                                    <div class="abajo">
                                        <form  action="{{route('eliminarFavorito')}}" method="POST">
                                            {{csrf_field()}}
                                            <label for="idLibro"></label>
                                            <input type="hidden" name="idLibro" id="idLibro" value="{{ $favorito->libro->id }}">
                                            <button type="submit" class="valoracion btn btn-info">
                                                Eliminar de favoritos
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
                <div class="boton">
                    <a href="{{url('/home')}}" class="btn btn-info" role="button">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection