@extends('layouts.app')

<!-- NO ME CARGA NADA DE LAYOUTS.APP -->

@section('content')

<link rel="stylesheet" href="/css/estilos-buscador.css">



  <div class="col-md-7">
    <div class="card card1">
      <div class="card-header">
        <h4>
          Para la busqueda:"{{ $palabra }}"</br>
          Resultados:{{count($busquedas)}}
        </h4>
      </div>
      <div class="cb1">
        <div class="libros">
          @if(count($busquedas)==0)
            {{'No hay resultados para la busqueda'}}
          @else
            </br>
            @foreach($busquedas as $libro)
              @if($libro->visible)
                <div class="libro">
                  <a  href="{{route('libro.trailer',$libro->id)}}">
                    <div class="imagen">
                      <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100" width="100">
                    </div>
                    <b><i>{{($libro->titulo)}}</i></b>
                  </a>
                </div>
              @endif
            @endforeach
          @endif
        </div>
      </div>
    </div>


  </div>

@endsection
