@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display:flex; justify-content: space-between;">
                    <h3 style="display:flex">
                        Bienvenido {{auth()->user()->name}}
                    </h3>
                    @if (auth()->user()->es_admin)
                        <a class="nav-link" style="display:flex; align-content: center;"href="{{route('administracion')}}">
                            Tareas administrativas
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                    <div>
                        <form action="{{ route('cuenta.update') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="text" name="name" placeholder="Nombre" class="form-control mb-2" value="{{auth()->user()->name}}">
                            </br>
                            <input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2" value="{{auth()->user()->apellido}}">
                            </br>
                            <div class="col-md-6">
                                <button class="btn btn-warning btn-block" type="submit">
                                    Editar
                                </button>
                            </div>
                        </form>
                    </div>
                    </br>
                    @if(Session::has('alertas'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('alertas') }}
                        </div>
                    @endif
                    @if(!auth()->user()->es_premium)
                        <form action="{{ route('solicitarPremium') }}" method="POST" >
                            @csrf
                            <input type="password" name="pass" placeholder="Contraseña" class="form-control mb-2" value="">
                            </br>
                            <button type="submit">
                                Solicitar Premium
                            </button>
                        </form>
                    @else
                        <form action="{{ route('cancelarPremium') }}" method="POST" >
                            @csrf
                            <input type="password" name="pass" placeholder="Contraseña" class="form-control mb-2" value="">
                            </br>
                            <button type="submit">
                                Cancelar Premium
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection