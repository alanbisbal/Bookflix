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


              <form action="{{'cargarPerfil'}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}

                @error('nombre')
                @enderror
                <label for="nombre">{{'Nombre de perfil: '}}</label>
                </br>
                <input type="text" name="nombre" id="nombre" value="">
                </br>
                @if($errors->has('nombre'))
                  El nombre no puede estar vacio
                @endif

                <label for="imagen">{{'Imagen de perfil: '}}</label>
                </br>

                <input accept="image/*" type="file" name="imagen" >

                </br>
                <input type="submit" value="Agregar">
              </form>


            </div>
        </div>
    </div>
</div>
@endsection
