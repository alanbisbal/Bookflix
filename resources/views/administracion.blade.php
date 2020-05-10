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
                          <a href="{{'librosCargados'}}" class="btn btn-info" role="button">Ver libros
                        </a>
                        </container>
                        </br></br>
                        <container>
                          <a href="{{'novedadesCargados'}}" class="btn btn-info" role="button" >Ver novedades
                        </a>
                        </container>

                      </br></br>
                          <container>
                          <a href="{{'autoresCargados'}}" class="btn btn-info" role="button">Ver autores
                          </a>
                        </container>
                          </br></br>
                          <container>
                          <a href="{{'editorialesCargados'}}" class="btn btn-info" role="button">Ver editoriales
                            </a>
                        </container>
                          </br></br>
                          <container>
                          <a href="{{'generosCargados'}}" class="btn btn-info" role="button">Ver generos
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
