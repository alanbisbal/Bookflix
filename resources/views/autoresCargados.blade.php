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
                      <a href="{{'agregarAutor'}}" class="btn btn-info" role="button">Nuevo autor
                      </a>
                    </container>
                </div>
                <container>
                  <table class="table table-light">
                    <thread class="thread-light">
                      <th>ID</th>
                      <th>Nombre</th>
                      <th></th>
                      <th></th>
                    </thread>
                    <tbody>
                        @foreach($autores as $autor)
                          <tr>
                            <td> {{$loop->iteration}}</td>
                            <td> {{$autor->nombre}}</td>
                            <th>
                              <form action="{{ route('autor.eliminar', $autor->id )}}" class="d-inline" method="POST">
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                              </form>

                          </th>
                          <th>
                            <form  >
                              <td>
                                  <a href="{{route('autor.editar', $autor->id)}}" class="btn btn-warning btn-sm">Editar</a>
                              </td>
                            </form>
                          </th>


                          </tr>

                        @endforeach
                      </tbody>

                </container>
            </div>



    </div>
</div>
@endsection
