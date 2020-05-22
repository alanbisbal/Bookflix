@extends('layouts.app')
<style>
  .perfiles{
    text-decoration: none;
    color: red;
  }
  .perfiles:hover{
    text-decoration: none;
    color: red;
    font-weight: bold;
  }
</style>
@section('content')
<div class="menu">
  <div class="background-overlay">
    <div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card" style="border: 2px solid black;">
                <div class="card-header" style="background-color: black; color: white; border: 2px solid black;">
                <!--  Bienvenido {{auth()->user()->name}}
                  @if (auth()->user()->es_admin)
                     <p>(Administrador)</p>
                    <a class="btn-link" href="{{route('administracion')}}">Tareas administrativas</a>
                  @endif -->

                <h5 class="text-center">Seleccioná tu perfil</h5>
                 </div>
                <div class="card-body" align="center" style="background-color: white" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                      @foreach($perfiles as $perfil)
                      <div class="d-inline-block" style="width: 200px; height: 150px;" >
                      <a class="perfiles" href="{{ ('/home'.'/'.$perfil->id) }}">
                        @if(!empty($perfil->imagen))
                        <img src="{{asset('storage').'/'.$perfil->imagen}}" alt="100% "width="100%" >
                        @else
                          <img src="imagenes/perfil.jpg" alt="100% "width="100%" >
                        @endif</br>
                        {{ $perfil->nombre }}
                        </a>
                      </br>
                      </div>
                      @endforeach


                      @for ($i = 0; $i < $cant; $i++)
                        <div class="d-inline-block " style="width: 200px; height: 150px; ">
                          <a class="perfiles "href="{{route('nuevoPerfil')}}">
                        <img src="/imagenes/perfil.jpg"  alt="100% "width="100%"></br>
                        Nuevo perfil </a>
                        </br>
                        </div>
                      @endfor

                </div>
            </div>


    </div>
</div>
</div>
</div>
</div>

@endsection
