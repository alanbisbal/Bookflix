@extends('layouts.app')

<!-- NO ME CARGA NADA DE LAYOUTS.APP -->

@section('content')

<link rel="stylesheet" href="/css/estilos-home.css">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4>
          Nuevos
        </h4>
      </div>
      <div class="card-body">
        @foreach($nuevos as $libro)
          @if($libro->visible)
            <div class="elementos">
              <a class="libros" href="{{route('libro.trailer',$libro->id)}}">
                <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100" width="100"></br>
                Trailer
              </a>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
  <div class="col-md-3">
    @include('vistas-includes.seccion-noticias') 
  </div>
@endsection
