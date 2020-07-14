@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-register.css">

    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('Registrate') }}</h3> 
            </div>
            <div class="card-body">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger errores" role="alert">
                        {{$error}}
                    </div>
                @endforeach
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="columnas">
                        <div class="izquierda">
                            <div class="texto">
                                <h4>
                                    Datos personales:
                                </h4>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Nombre:') }}
                                </label>
                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="apellido" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Apellido:') }}
                                </label>
                                <div class="col-md-7">
                                    <input id="apellido" type="text" class="form-control " name="apellido" value="{{ old('apellido') }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Correo electrónico:') }}
                                </label>
                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Contraseña:') }}
                                </label>
                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Confirmar contraseña:') }}
                                </label>
                                <div class="col-md-7">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f_nac" class="col-md-4 col-form-label text-md-right">
                                    Fecha de nacimiento:
                                </label>
                                <div class="col-md-7">
                                    <input id="f_nac" class="form-control align-center" type="date"  name="f_nac" value="{{old('f_nac')}}"
                                        min="1900-01-01"
                                        max="2500-12-41">
                                </div>
                            </div>
                        </div>
                        <div class="derecha">
                            <div class="texto">
                                <h4>
                                    Datos de la tarjeta:
                                </h4>
                            </div>
                            <div class="form-group row">
                                <label for="titular" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Titular:') }}
                                </label>
                                <div class="col-md-7">
                                    <input id="titular" type="text" class="form-control" name="titular" value="{{ old('titular') }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="n_tarjeta" class="col-md-4 col-form-label text-md-right">
                                    N° Tarjeta:
                                </label>
                                <div class="col-md-7">
                                    <input id="n_tarjeta" type="text"  name="n_tarjeta" class="form-control" value="{{old('n_tarjeta')}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="t_codigo" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Código de seguridad:') }}
                                </label>
                                <div class="col-md-7">
                                    <input id="t_codigo" type="text" name="t_codigo" class="form-control" value="{{old('t_codigo')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="idBanco"class="col-md-4 col-form-label text-md-right">
                                    {{'Banco:'}}
                                </label>
                                <select name="idBanco" class="banco col-md-6">
                                    @foreach($bancos as $banco)
                                        <option value="{{$banco->id}}">
                                            {{$banco->nombre}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-0 boton">
                                    <button type="submit" class="btn btn-primary btn-general">
                                        {{ __('Registrarse') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
