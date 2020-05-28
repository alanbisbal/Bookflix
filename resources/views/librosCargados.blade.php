@extends('layouts.app')

<link rel="stylesheet" href="css/estilos-librosCargados.css">

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"> 
          <h3>
            Libros cargados:
          </h3>
          @include('vistas-includes.cabecera-tarjeta')
        </div>
        <div class="tarjetasanidadas">
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <div>
              <a href="{{'agregarLibro'}}" class="btn btn-info" role="button">
                Agregar libro
              </a>
            </div>
            <table class="table table-light">
              <thread class="thread-light">
                <th>Título</th>
                <th>Portada</th>
                <th>Editorial</th>
                <th>Autor</th>
                <th>Género</th>
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
                      <form>
                        <td>
                          <a href="{{route('libro.editar', $libro)}}" class="btn btn-warning btn-sm">
                            Editar libro
                          </a>
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
@endsection
