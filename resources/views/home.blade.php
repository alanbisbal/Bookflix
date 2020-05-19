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


                        @if(!auth()->user()->es_premium)
                          {{$cant=2}}
                        @else
                          {{$cant=4}}
                        @endif
                          @if(is_null($perfiles))
                            Empty
                          @endif

                          {{$perfiles->get()}}
                      .................................
                      @foreach($perfiles as $perfil)
                          
                            {{$perfil->nombre}}
                      @endforeach






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
