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
                    @if (!auth()->user()->es_admin)
                      
                    <container>
                        <container>
                          <a href="#" class="btn btn-info" role="button">
                            <img src="https://image.freepik.com/vector-gratis/perfil-avatar-hombre-icono-redondo_24640-14044.jpg" width="100px"></img>
                          </a>
                        </container>
                        <container>
                          <a href="#" class="btn btn-info" role="button">
                            <img src="https://image.freepik.com/vector-gratis/perfil-avatar-hombre-icono-redondo_24640-14044.jpg" width="100px"></img>
                          </a>
                        </container><container>
                          <a href="#" class="btn btn-info" role="button">
                            <img src="https://image.freepik.com/vector-gratis/perfil-avatar-hombre-icono-redondo_24640-14044.jpg" width="100px"></img>
                          </a>
                        </container><container>
                          <a href="#" class="btn btn-info" role="button">
                            <img src="https://image.freepik.com/vector-gratis/perfil-avatar-hombre-icono-redondo_24640-14044.jpg" width="100px"></img>
                          </a>
                        </container>
                    </container>
                    @endif


                </div>

            </div>

            <container class="col-md-4" >
               <h4>Seccion de libros</h4>
            </container>
        </div>

        <container class="col-md-4" style="background-color:#aaaa">
           <h4>Seccion de novedades</h4>
        </container>
    </div>
</div>
@endsection
