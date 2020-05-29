@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-login.css">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('Iniciar sesión') }}</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label text-md-right">
                            {{ __('Correo electrónico') }}
                        </label>
                        <div class="col-md-7">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-7 offset-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Recuérdame') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-0 botones-login">
                            <button type="submit" class="btn btn-general">
                                {{ __('Iniciar sesión') }}
                            </button>
                            @if (Route::has('password.request'))
                                <button class="btn btn-general" href="{{ route('password.request') }}">
                                    {{ __('Olvidaste tu contraseña?') }}
                                </button>
                            @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
