@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/estilos-verLeidos.css">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>
                    Mis libros leídos
                </h3>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if(count($leidos)==0)
                    <h5>
                        <i>{{'Todavía no leíste ningún libro.'}}</i>
                    </h5>
                @else
                    <div class="libros">
                        @foreach($leidos as $leido)
                            @if($leido->libro->visible)
                                <div class="libro">
                                    <a class="libros" href="{{route('libro.trailer',$leido->libro->id)}}">
                                        <div class="imagen">
                                            <img src="{{asset('storage').'/'.$leido->libro->img_libro}}" alt="100" width="100">
                                        </div>
                                        <i>
                                            {{($leido->libro->titulo)}}
                                        </i>
                                    </a>
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