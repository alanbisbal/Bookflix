@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-verUsuariosEntreFechas.css">

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>
          Usuarios entre dos fechas
        </h3>
      </div>
      <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <div>
          @if(count($usuariosEntreFechas)==0)
            <h5><i>No hay usuarios creados entre las fechas establecidas.</i></h5>
            </br>
          @else
            <h5><i><b>Resultados totales: {{count($usuariosEntreFechas)}}</b></h5></i>
            <hr>
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
                      ✓
                    @else
                      X
                    @endif
                  </td>
                </tr>
              @endforeach
            </table>
          @endif
        </div>
        </br>
        <a href="{{ old('redirect_to', URL::previous())}}" class="btn btn-info" role="button">
          Volver
        </a>
      </div>
    </div>
  </div>
@endsection
