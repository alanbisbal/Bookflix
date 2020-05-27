@extends('layouts.app')

<link rel="stylesheet" href="css/estilos-autoresCargados.css">

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
            <a href="{{'agregarAutor'}}" class="btn btn-info" role="button">
              Agregar autor
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
              @foreach($autores as $autor)
                <tr>
                  <td> {{$autor->nombre}}</td>
                  <th>
                    <form action="{{ route('autor.eliminar', $autor->id )}}" class="d-inline" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger btn-sm" >Eliminar</button>
                    </form>
                  </th>
                  <th>
                    <form>
                      <td>
                        <a href="{{route('autor.editar', $autor->id)}}" class="btn btn-warning btn-sm">Editar</a>
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
