@extends('layouts.app')

<!-- NO ME CARGA NADA DE LAYOUTS.APP -->

@section('content')

<link rel="stylesheet" href="/css/estilos-buscador.css">



  <div class="col-md-8">
    <div class="card card1">
      <div class="card-header">
        <h4>
          Hubo {{count($busquedas)}} resultados para la búsqueda "{{ $palabra }}".
        </h4>
      </div>
        <div class="libros">
          @if(count($busquedas)==0)
            {{'No hay resultados para la búsqueda'}}
          @else
            </br>
            @foreach($busquedas as $libro)
              @if($libro->visible)
                <div class="libro">
                  <a  href="{{route('libro.trailer',$libro->id)}}">
                    <div class="imagen">
                      <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100" width="100">
                    </div>
                    <div class="titulo">
                      <b><i>{{($libro->titulo)}}</i></b>
                    </div>
                  </a>
                </div>
              @endif
            @endforeach
          @endif
        </div>
        <div class="boton-volver">
          <a href="{{url('/home')}}" class="btn btn-info" role="button">
            Volver
          </a>
        </div>
      </div>
    </div>

@endsection
