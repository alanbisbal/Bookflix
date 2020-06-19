@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-verCatalogo.css">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>
                    Catálogo de libros
                </h3>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="libros">
                    @foreach($libros as $libro)
                        @if($libro->visible)
                            <div class="libro">
                                <a href="{{route('libro.trailer',$libro->id)}}">
                                    <div class="imagen">
                                        <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100" width="100">
                                    </div>
                                    <i>
                                        {{($libro->titulo)}}
                                    </i>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="boton">
                    <a href="{{url('/home')}}" class="btn btn-info" role="button">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection