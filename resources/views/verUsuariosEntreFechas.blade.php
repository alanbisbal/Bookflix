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
          @if(count($usuariosEntreFechas)==0)
            No hay usuarios creados entre las fechas establecidas
          </br>
          @else
      Resultados totales:{{count($usuariosEntreFechas)}}
        <table class="egt" style="text-align:center;">

  <tr>
    <th>Email</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Fecha de creacion</th>
    <th >Premium</th>
  </tr>
    @foreach($usuariosEntreFechas as $u)
    <tr>
    <td>{{$u->email}}</td>
    <td>{{$u->name}}</td>
    <td>{{$u->apellido}}</td>
    <td>{{$u->created_at}}</td>
    <td>
        @if($u->es_premium)
        si
        @else
        no
        @endif</td>
    </tr>
    @endforeach

        </div>
  </table>
@endif
        <a href="{{ old('redirect_to', URL::previous())}}" class="btn btn-info" role="button">
          Volver
        </a>
      </div>
    </div>
  </div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 3cb92584de9ded0ec32ebff5ae05a045585df41d
