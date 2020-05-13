@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
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


    </div>
    <div class="col-md-3">
      <div class="card">
          <div class="card-header" >
            Seccion de Novedades</br>
          </div>

            <div class="card-body" >
            @foreach($novedades as $novedad)
              <div class="card-header" >
                {{$novedad->titulo}}
                  </div>
             {{$novedad->desc}}
              </br>
            @endforeach
            </div>
          </div>
            </div>

</div>

@endsection
