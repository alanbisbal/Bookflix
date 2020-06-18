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
                    Mis libros leídos
                    </br>
                    @if(count($leidos)==0)
                        {{'Todavía no leíste ningún libro.'}}
                    @else
                        .................................................................
                        </br>
                        @foreach($leidos as $leido)
                            @if($leido->libro->visible)
                                <a class="libros" href="{{route('libro.trailer',$leido->libro->id)}}">
                                    <img src="{{asset('storage').'/'.$leido->libro->img_libro}}" alt="100" width="100">
                                    </br>
                                    Trailer
                                </a>
                                </br>
                                .................................................................
                                </br>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection