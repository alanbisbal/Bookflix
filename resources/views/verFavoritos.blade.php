@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
                    Mis favoritos
                    </br>
                    @if(count($favoritos)==0)
                        {{'Tu lista de favoritos esta vacia.'}}
                    @else
                        .................................................................
                        </br>
                        @foreach($favoritos as $favorito)
                            ID:{{$favorito->libro->id}}
                            </br>
                            TITULO:{{$favorito->libro->titulo}}
                            </br>
                            DESC:{{$favorito->libro->desc}}
                            </br>
                            <form  action="{{route('eliminarFavorito')}}" method="POST">
                                {{csrf_field()}}
                                <label for="idLibro"></label>
                                <input type="hidden" name="idLibro" id="idLibro" value="{{ $favorito->libro->id }}">
                                <button style="color:grey" type="submit" class="valoracion">
                                    Eliminar favorito
                                </button>
                                </br>
                                .................................................................
                            </form>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection