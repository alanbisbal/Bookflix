@extends('layouts.app')

<link rel="stylesheet" href="css/estilos-editorialesCargados.css">

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3>
            Editoriales cargadas:
          </h3>
          @include('vistas-includes.cabecera-tarjeta')
        </div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <div>
            <a href="{{'agregarEditorial'}}" class="btn btn-info" role="button">
              Agregar editorial
            </a>
          </div>
        </div>
        <div>
          <div>
            <table class="table table-light">
              <thread class="thread-light">
                  <th>Nombre</th>
              </thread>
              <tbody>
                @foreach($editoriales as $editorial)
                  <tr>
                    <td> {{$editorial->nombre}}</td>
                    <th></th>
                    <th></th>
                    <th>
                      <form action="{{ route('editorial.eliminar', $editorial->id )}}" class="d-inline" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                      </form>
                    </th>
                    <th>
                      <form>
                        <td>
                          <a href="{{route('editorial.editar', $editorial->id)}}" class="btn btn-warning btn-sm">
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
  </div>
@endsection
