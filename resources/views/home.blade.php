@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header" > Bienvenido {{auth()->user()->name}} </br>
                  Estas con el perfil {{$perfilActivo->nombre}}
                  @if (auth()->user()->es_admin)
                     <p>(Administrador)</p>
                    <a class="nav-link" href="{{route('administracion')}}">Tareas administrativas</a>
                  @endif
                 </div>
                <div class="card-body" align="center"  >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body" >
                    @foreach($libros as $libro)
                      <div class="card-header" >
                        titulo:{{$libro->titulo}}
                      </br>
                        isbn:{{$libro->isbn}}
                          </div>
                     portada:</br>
                     <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100 "width="100" ></br>
                      </br>
                    @endforeach
                    </div>

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
