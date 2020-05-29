@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-register.css">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('Registrate') }}</h3> 
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label text-md-right">
                            {{ __('Nombre') }}
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
                        <label for="email" class="col-md-3 col-form-label text-md-right">
                            {{ __('Correo electrónico') }}
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
                        <label for="password" class="col-md-3 col-form-label text-md-right">
                            {{ __('Contraseña') }}
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
                        <label for="password-confirm" class="col-md-3 col-form-label text-md-right">
                            {{ __('Confirmar contraseña') }}
                        </label>
                        <div class="col-md-7">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="f_nac" class="col-md-3 col-form-label text-md-right">Fecha de Nacimiento </label>
                        <div class="col-md-7">
                            <input id="f_nac" class="form-control align-center" type="date"  name="f_nac" value="2000-01-01"
                                min="1900-01-01"
                                max="2500-12-31">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-7 offset-md-3 boton">
                            <button type="submit" class="btn btn-primary btn-general">
                                {{ __('Registarse') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
