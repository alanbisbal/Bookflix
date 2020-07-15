@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/css/estilos-editarPerfil.css">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>
                    Editar perfil
                </h3>
                @include('vistas-includes.cabecera-tarjeta')
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('mensaje'))
                    <div class="alert alert-success">
                        {{ session('mensaje') }}
                    </div>
                @endif
                <form action=" {{route('perfil.update', $perfil->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="editar">
                        <div class="foto">
                            @if(!empty($perfil->imagen))
                                <div class="imagen">
                                    <img src="{{asset('storage').'/'.$perfil->imagen}}" alt="100% "width="100%" >
                                </div>
                            @else
                                <div class="imagen">
                                    <img src="/imagenes/perfil.jpg" alt="100% "width="100%">
                                </div>
                            @endif
                            </br>
                            <span>Seleccione su nueva foto de perfil:</span>
                            </br>
                            <input accept="image/*" type="file" name="imagen">
                        </div>
                        <div class="colderecha">
                            <div class="nombre">
                                <span>Ingrese el nuevo nombre del perfil:</span>
                                <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-3" value="{{ $perfil->nombre }}">
                            </div>
                        </div>
                        </br>
                    </div>
                    <button class="btn btn-info " type="submit" style="width: 100%">
                        Guardar cambios
                    </button>
                    </br>
                </form>
                <hr>
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endforeach
                @if(Session::has('alertas'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('alertas') }}
                    </div>
                @endif
                @if($perfil->estado)
                <form action="{{route('desactivarPerfil', $perfil->id)}}" method="POST" >
                    @csrf
                    <div class="desac_y_elim">
                        <span>Ingrese su contraseña: </span>
                        <input type="password" name="pass" placeholder="Contraseña" class="form-control mb-2" value="">
                        <button class="btn btn-info" type="submit">
                            Desactivar perfil
                        </button>
                    </div>
                </form>
                @else
                <form action="{{route('activarPerfil', $perfil->id)}}" method="POST" >
                    @csrf
                    <div class="desac_y_elim">
                        <span>Ingrese su contraseña: </span>
                        <input type="password" name="pass" placeholder="Contraseña" class="form-control mb-2" value="">
                        <button class="btn btn-info" type="submit">
                            Activar perfil
                        </button>
                    </div>
                </form>
                @endif
                <hr>
                <form action="{{route('eliminarPerfil', $perfil->id)}}" method="POST" >
                    @csrf
                    <div class="desac_y_elim">
                        <span>Ingrese su contraseña: </span>
                        <input type="password" name="pass" placeholder="Contraseña" class="form-control mb-2" value="">
                        <button class="btn btn-info" type="submit">
                            Eliminar perfil
                        </button>
                    </div>
                </form>
                <hr>
                <a href="{{url('/seleccionPerfil')}}" class="botonvolver btn btn-info" role="button">
                    Volver
                </a>
            </div>
        </div>
    </div>

@endsection
