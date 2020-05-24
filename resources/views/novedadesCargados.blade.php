@extends('layouts.app')

<!-- PREGUNTAR POR EL ALINEADO DE LOS BOTONES DE "ELIMINAR" -->

<link rel="stylesheet" href="css/estilos-novedadesCargados.css">

@section('content')
<div class="menu">
  <div class="background-overlay">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h3>Bienvenido {{auth()->user()->name}}</h3>
                  @if (auth()->user()->es_admin)
                    <a class="nav-link" href="{{route('administracion')}}">Tareas administrativas</a>
                  @endif
                 </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="header-body">
                      <h5>Novedades actuales:</h5>
                      <a href="{{'agregarNovedad'}}" class="btn btn-info" role="button">
                        Agregar novedad
                      </a>
                    </div>
                    <div class="encabezado-novedades">
                      <div class="centrar-items">Titulo</div>
                      <div class="centrar-items">Descripcion</div>
                      <div class="centrar-items"></div>
                      <div class="centrar-items"></div>
                    </div>
                    <div class="novedades">
                        @foreach($novedades as $novedad)              
                            <div class="nov-item"> {{$novedad->titulo}}</div>
                            <div class="nov-item"> {{$novedad->desc}}</div>
                            <div class="nov-item">
                              <form action="{{ route('novedad.eliminar', $novedad->id )}}" method="POST">
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                              </form>
                            </div>
                             <div class="nov-item">
                              <form style="display: contents">
                                    <a href="{{route('novedad.editar', $novedad)}}" class="btn btn-warning btn-sm">Editar</a>
                              </form>
                            </div>
                        @endforeach      
                   </div>
                </div>
          </div>
       </div>
    </div>
  </div>
</div>
@endsection
