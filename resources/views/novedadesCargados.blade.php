@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Bienvenido {{auth()->user()->name}}
                  @if (auth()->user()->es_admin)
                     <p>(Administrador)</p>
                    <a class="nav-link" href="{{route('administracion')}}">Tareas administrativas</a>
                  @endif
                 </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <container>
                      <a href="{{'agregarNovedad'}}" class="btn btn-info" role="button">Nueva novedad
                      </a>
                    </container>

                    Novedades actuales:
                  </br>
                  <table class="table table-light">
                    <thread class="thread-light">
                      <th>ID</th>
                      <th>Titulo</th>
                      <th>Descripcion</th>
                    </thread>
                    <tbody>
                        @foreach($novedades as $novedad)
                          <tr>
                            <td> {{$loop->iteration}}</td>
                            <td> {{$novedad->titulo}}</td>
                            <td> {{$novedad->desc}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                </container>
            </div>



    </div>
</div>
@endsection
