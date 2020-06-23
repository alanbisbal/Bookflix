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
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endforeach
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
                </form>
            </div>
        </div>
    </div>
@endsection
