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
          Cantidad de usuarios totales: {{$uTot}}
        </div>
        <div class="alert alert-success" role="alert">
          Cantidad de usuarios entre 18 y 30 años:{{$u18y30}}
        </div>

        <div class="alert alert-success" role="alert">
          Cantidad de usuarios entre 31 y 50 años:{{$u31y50}}
        </div>
        <div class="alert alert-success" role="alert">
          Cantidad de usuarios con mas de 51 años:{{$u51mas}}
        </div>

        <div class="alert alert-success" role="alert">
        Los usuarios que mas leyeron</br>
        @foreach($uMasLecturas as $u)
          {{$u->email}}
        </br>
        @endforeach
        </div>

        <div class="alert alert-success" role="alert">
        Los usuarios que mas comentaron</br>
        @foreach($uMasComentarios as $u)
            {{$u->email}}
        </br>
        @endforeach
        </div>

        <div class="alert alert-success" role="alert">
          Los usuarios con premium {{count($uPremium)/$uTot*100 }}%</br>
          @foreach($uPremium as $u)
          {{$u->email}}
        </br>
        @endforeach
      </div>

        <div class="alert alert-success" role="alert">
        Los usuarios sin premium {{count($uNoPremium)/$uTot*100 }}%</br>
        @foreach($uNoPremium as $u)
            {{$u->email}}
        </br>
        @endforeach
        </div>




        <div class="alert alert-success" role="alert">
          Cantidad de usuarios entre dos fechas...:
        </div>

        <a href="{{'administracion'}}" class="btn btn-info" role="button">
          Volver
        </a>
      </div>
    </div>
  </div>
@endsection
