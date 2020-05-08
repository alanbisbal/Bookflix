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

                        <container>
                          <a href="{{'agregarLibro'}}" class="btn btn-info" role="button">Agregar libro
                        </a>
                        </container>
                        </br></br>
                        <container>
                          <a href="{{'agregarNovedad'}}" class="btn btn-info" role="button" >Agregar novedad
                        </a>
                        </container>

                      </br></br>
                          <container>
                          <a href="{{'agregarAutor'}}" class="btn btn-info" role="button">Agregar autor
                          </a>
                        </container>
                          </br></br>
                          <container>
                          <a href="{{'agregarEditorial'}}" class="btn btn-info" role="button">Agregar editorial
                            </a>
                        </container>
                          </br></br>
                          <container>
                          <a href="{{'agregarGenero'}}" class="btn btn-info" role="button">Agregar genero
                          </a>
                        </container>
                          </br></br>
                    </container>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
