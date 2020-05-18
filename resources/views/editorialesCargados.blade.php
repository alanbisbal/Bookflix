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
                      <a href="{{'agregarEditorial'}}" class="btn btn-info" role="button">Nueva editorial
                      </a>
                    </container>
                </div>
                <div>
                <container>
                  <table class="table table-light">
                    <thread class="thread-light">
                      <th>ID</th>
                      <th>Nombre</th>
                    </thread>
                    <tbody>
                        @foreach($editoriales as $editorial)
                          <tr>
                            <td> {{$loop->iteration}}</td>
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
                            <form  >
                              <td>
                                  <a href="{{route('editorial.editar', $editorial->id)}}" class="btn btn-warning btn-sm">Editar</a>
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
