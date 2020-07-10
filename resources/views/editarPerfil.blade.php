@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-editarNovedad.css">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>
                    Editar perfil:
                </h3>
                @include('vistas-includes.cabecera-tarjeta')
            </div>
            <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h1>Editar perfil</h1>
                @if (session('mensaje'))
                    <div class="alert alert-success">
                        {{ session('mensaje') }}
                    </div>
                @endif
<<<<<<< HEAD
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endforeach
=======

>>>>>>> 3cb92584de9ded0ec32ebff5ae05a045585df41d
                <form action=" {{route('perfil.update', $perfil->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    Nombre:
                    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $perfil->nombre }}">

                    <div class="imagen">
                      <img src="{{asset('storage').'/'.$perfil->imagen}}" alt="150px "width="150px" >
                    </div>
                      <input accept="image/*" type="file" name="imagen" >
                    <button class="btn btn-warning btn-block" type="submit">
                        Editar perfil
                    </button>
<<<<<<< HEAD
=======
                  </br>
                </form>
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
                    <input type="password" name="pass" placeholder="Contraseña" class="form-control mb-2" value="">
                    <button class="btn btn-warning" type="submit">
                        Desactivar perfil
                    </button>
                </form>
                @else
                <form action="{{route('activarPerfil', $perfil->id)}}" method="POST" >
                    @csrf
                    <input type="password" name="pass" placeholder="Contraseña" class="form-control mb-2" value="">
                    <button class="btn btn-warning" type="submit">
                        Activar perfil
                    </button>
                </form>
                @endif
                <form action="{{route('eliminarPerfil', $perfil->id)}}" method="POST" >
                    @csrf
                    <input type="password" name="pass" placeholder="Contraseña" class="form-control mb-2" value="">
                    <button class="btn btn-warning" type="submit">
                        Eliminar perfil
                    </button>
>>>>>>> 3cb92584de9ded0ec32ebff5ae05a045585df41d
                </form>
            </div>
        </div>
    </div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 3cb92584de9ded0ec32ebff5ae05a045585df41d
