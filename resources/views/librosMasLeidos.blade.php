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


        <div class="alert alert-success" role="alert">

  <div class="libros">
    @foreach($masLeidos as $libro)


        <b><i>{{($libro->titulo)}} </i></b></br>
        se leyó {{count($libro->lecturas)}} veces
          <div class="imagen">
            <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100" width="100">
            </div>



    @endforeach
</div>
        </div>

        <a href="{{ old('redirect_to', URL::previous())}}" class="btn btn-info" role="button">
          Volver
        </a>
      </div>
    </div>
  </div>
@endsection
