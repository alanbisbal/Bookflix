@extends('layouts.app')

<link rel="stylesheet" href="css/estilos-generosCargados.css">

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3>
            Bienvenido {{auth()->user()->name}}
          </h3>
          @if (auth()->user()->es_admin)
            <a class="nav-link" href="{{route('administracion')}}">
              Tareas administrativas
            </a>
          @endif
        </div>
        <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
          <div>
            <a href="{{'agregarGenero'}}" class="btn btn-info" role="button">
              Agregar género
            </a>
          </div>
        </div>
        <div>
          <table class="table table-light">
            <thread class="thread-light">
              <th>Nombre</th>
              <th></th>
              <th></th>
            </thread>
            <tbody>
              @foreach($generos as $genero)
                <tr>
                  <td> {{$genero->nombre}}</td>
                  <th>
                    <form action="{{ route('genero.eliminar', $genero->id )}}" class="d-inline" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                  </th>
                  <th>
                    <form>
                      <td>
                        <a href="{{route('genero.editar', $genero)}}"  class="btn btn-warning">
                          Editar
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
@endsection
