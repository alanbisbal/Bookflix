@extends('layouts.app')

@section('content')
<div class="menu">
  <div class="background-overlay" >
    <div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="width: 100%; height: 80%; display: flex; min-width: 650px;">
              <div class="card-header" style="display:flex; justify-content: space-between;"> <h3 style="display:flex">Bienvenido {{auth()->user()->name}}</h3>
                  @if (auth()->user()->es_admin)

                    <a class="nav-link" style="display:flex; align-content: center" href="{{route('administracion')}}">Tareas administrativas</a>
                  @endif
                 </div>
                  <div class="tarjetasanidadas " style="overflow-y: scroll;max-height: 650px;  height: 100%; ">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                    <container>
                      <a href="{{'agregarLibro'}}" class="btn btn-info" role="button">Nuevo libro
                      </a>
                    </container>
                  </div>

                  <table class="table table-light">
                    <thread class="thread-light">

                      <th>Titulo</th>
                      <th>Portada</th>
                      <th>editorial</th>
                      <th>autor</th>
                      <th>genero</th>

                    </thread>
                    <tbody>
                        @foreach($libros as $libro)
                          <tr>

                            <td> <a href="{{asset('storage').'/'.$libro->pdf}}" >{{$libro->titulo}}</a></td>
                            <td> <img src="{{asset('storage').'/'.$libro->img_libro}}"alt="" width="100"> </td>
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
                    </table>

              </div>
              </div>
            </div>
</div>
</div>
</div>
    </div>
</div>
@endsection
