@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-estadisticas.css">

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>
          Estadísticas:
        </h3>
      </div>
      <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <div class="libros">
          @foreach($masLeidos as $libro)
            <b>{{count($libro->lecturas)}}</b> lecturas - <b><i>{{($libro->titulo)}}</i></b> de <i><b>{{$libro->autorL->nombre}}</i></b>.
            </br>
          @endforeach
        </div>
        <a href="{{ old('redirect_to', URL::previous())}}" class="btn btn-info" role="button">
          Volver
        </a>
      </div>
    </div>
  </div>
  
@endsection
