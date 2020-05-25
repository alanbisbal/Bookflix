@extends('layouts.app')

@section('content')
<div class="menu">
  <div class="background-overlay">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            Bienvenido {{auth()->user()->name}}
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
            <container>
              <a href="{{'agregarGenero'}}" class="btn btn-info" role="button">
                Agregar género
              </a>
            </container>
          </div>
          <container>
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
          </container>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
