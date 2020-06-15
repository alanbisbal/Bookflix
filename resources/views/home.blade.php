@extends('layouts.app')

<!-- NO ME CARGA NADA DE LAYOUTS.APP -->

@section('content')

<link rel="stylesheet" href="/css/estilos-home.css">
  <div class="col-md-8">
     <div class="card">
      <div class="card-header">
        <h3>Bienvenido {{session('perfil')->nombre}}</h3>
        @include('vistas-includes.cabecera-tarjeta')
      </div>
      <div class="tarjetasanidadas">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <div class="card-body card-body-libros">
          <div class="recomendacion">
            <h4>
              Mas votados
            </h4>
            </br>
            @foreach($libros as $libro)
              <div class="elementos">
                <a class="libros" href="{{route('libro.trailer',$libro->id)}}">
                  <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100" width="100">
                  </br>
                  <h6 class="titulo text-center">
                    {{($libro->titulo)}}
                  </h6>
                </a>
              </div>
            @endforeach
          </div>
          <div class="recomendacion">
            <h4>
              Mas leidos
            </h4>
            </br>
            @foreach($masleidos as $libro)
                [<div class="elementos">
                  <a class="libros" href="{{route('libro.trailer',$libro->id)}}">
                    <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100" width="100"></br>
                    Trailer
                  </a>
                </div>]
            @endforeach
          </div>
          <div class="recomendacion">
            <h4>
              Nuevos
            </h4>
            </br>
            @foreach($nuevos as $libro)
              <div class="elementos">
                <a class="libros" href="{{route('libro.trailer',$libro->id)}}">
                  <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100" width="100"></br>
                  Trailer
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    @include('vistas-includes.seccion-noticias') 
  </div>
@endsection
