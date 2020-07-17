@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-verCuenta.css">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Mi cuenta:
                    </h3>
                </div>
                <div class="card-body">
                    @if(Session::has('alertas'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('alertas') }}
                        </div>
                    @endif
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
                    @if(!auth()->user()->es_premium)
                        <form action="{{ route('solicitarPremium') }}" method="POST" >
                            @csrf
                            <input type="password" name="pass" placeholder="Contraseña" class="form-control mb-2" value="">
                            <button class="btn btn-warning" type="submit">
                                Solicitar Premium
                            </button>
                        </form>
                    @else
                        <form action="{{ route('cancelarPremium') }}" method="POST" >
                            @csrf
                            <input type="password" name="pass" placeholder="Contraseña" class="form-control mb-2" value="">
                            <button class="btn btn-warning" type="submit">
                                Cancelar Premium
                            </button>
                        </form>
                    @endif
                    </br>
                    <div>
                        <h5>Editar perfil</h5>
                        <div class="alert alert-success">
                            <form action="{{ route('cuenta.update') }}" method="POST">
                                @method('PUT')
                                @csrf
                                Nombre
                                <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{auth()->user()->name}}">
                                </br>
                                Apellido
                                </br>
                                <input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2" value="{{auth()->user()->apellido}}">
                                </br>
                                Contraseña
                                <input type="password" name="password" placeholder="password" class="form-control mb-2" value="{{auth()->user()->password}}">
                                </br>
                                Titular de tarjeta
                                <input type="titular" name="titular" placeholder="titular" class="form-control mb-2" value="{{auth()->user()->tarjeta->titular}}">
                                </br>
                                Numero de tarjeta
                                <input type="numero" name="numero" placeholder="numero" class="form-control mb-2" value="{{auth()->user()->tarjeta->numero}}">
                                </br>
                                Codigo de tarjeta
                                <input type="codigo" name="codigo" placeholder="codigo" class="form-control mb-2" value="{{auth()->user()->tarjeta->codigo}}">
                                </br>
                                <div class="boton">
                                    <a href="{{url('/home')}}" class="btn btn-info" role="button">
                                        Volver
                                    </a>
                                    <button class="btn btn-info" type="submit">
                                        Editar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
