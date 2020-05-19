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
                      <th>Titulo</th>
                      <th>Portada</th>
                      <th>Tit. trailer</th>
                      <th>Imagen trailer</th>
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
                            <td> {{$libro->titulo}}</td>
                            <td> <img src="{{asset('storage').'/'.$libro->img_libro}}"alt="" width="100"> </td>
                            <td> {{$libro->titulo_trailer}}</td>
                            <td> <img src="{{asset('storage').'/'.$libro->img_trailer}}"alt="" width="100"> </td>
                            <td> {{$libro->desc_trailer}}</td>
                            <td> {{$libro->editorialL->nombre}}</td>
                            <td> {{$libro->autorL->nombre}}</td>
                            <td> {{$libro->generoL->nombre}}</td>
                            <th>
                              <form action="{{ route('libro.eliminar', $libro->id )}}" class="d-inline" method="POST">
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                              </form>

                          </th>
                          <th>
                            <form  >
                              <td>
                                  <a href="{{route('libro.editar', $libro)}}" class="btn btn-warning btn-sm">Editar</a>
                              </td>
                            </form>
                            </th>
                          </tr>
                        @endforeach
                      </tbody>
                </container>
            </div>

            Modificar la cantidad de generos y autores para cada libro



    </div>
</div>
@endsection
