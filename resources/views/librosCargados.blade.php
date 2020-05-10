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
                      <a href="{{'agregarLibro'}}" class="btn btn-info" role="button">Nuevo libro
                      </a>
                    </container>
                </div>
                <container>
                  <table class="table table-light">
                    <thread class="thread-light">
                      <th>ID</th>
                      <th>ISBN</th>
                      <th>Portada</th>
                      <th>Tit. trailer</th>
                      <th>desc. trailer</th>
                      <th>editorial</th>
                      <th>autor</th>
                      <th>genero</th>

                    </thread>
                    <tbody>
                        @foreach($libros as $libro)
                          <tr>
                            <td> {{$loop->iteration}}</td>
                            <td> {{$libro->isbn}}</td>
                            <td> {{$libro->titulo_trailer}}</td>
                            <td> {{$libro->desc_trailer}}</td>
                            <td> {{$libro->editorial}}</td>
                            <td> {{$libro->genero}}</td>
                            <td> {{$libro->autor}}</td>
                          </tr>
                        @endforeach
                      </tbody>

                      solucionar imagenes de trailer y portada, enlazar autor y editorial mediante relacion
                </container>
            </div>



    </div>
</div>
@endsection
