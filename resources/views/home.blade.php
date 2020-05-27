@extends('layouts.app')

<!-- NO ME CARGA NADA DE LAYOUTS.APP -->

<link rel="stylesheet" href="css/estilos-home.css">

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="text-center align-middle">
          Bienvenido {{$perfilActivo->nombre}}
        </h3>
        @if (auth()->user()->es_admin)
          <a class="nav-link" href="{{route('administracion')}}">
            Tareas administrativas
          </a>
        @endif
      </div>
      <div class="tarjetasanidadas">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <div class="card-body">
          @foreach($libros as $libro)
            <div class="card-header" >
              <a class="libros" href="{{asset('storage').'/'.$libro->pdf}}">
                {{$libro->titulo}}
                <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100" width="100">
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card" style="overflow: hidden;" >
      <div class="card-header" style=" height: 20%;background-color: #383232; border: 2px solid black; border-radius: 0px; width: 100%; color: white;">
        Sección de novedades
      </div>
      <div class="tarjetasanidadas">
        @foreach($novedades as $novedad)
          <div class="text-dark tarjetaanidada-una">
            <div class="card-body " style="height: 110px; background-color: white; border-bottom: gray 2px solid;">
              <h5 class="card-title text-Left">{{$novedad->titulo}}</h5>
              <p class="card-text text-center">{{$novedad->desc}}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
