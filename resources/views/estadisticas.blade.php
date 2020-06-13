@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header" style="display:flex; justify-content: space-between;"> <h3 style="display:flex">Bienvenido {{auth()->user()->name}}</h3>
                @if (auth()->user()->es_admin)
                  <a class="nav-link" style="display:flex; align-content: center;"href="{{route('administracion')}}">Tareas administrativas</a>
                    @endif
                 </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Estadisticas </br>
                      <div class="alert alert-success" role="alert">
                    Cantida de usuarios totales: {{$users->count()}}
                      </div>
                    @foreach($users as $user)
                    <div class="alert alert-success" role="alert">
                        Nombre: {{$user->name}}</br>
                        Apellido: {{$user->apellido}}</br>

                    </div>
                    @endforeach
              </div>
          </div>
      </div>
  </div>
@endsection