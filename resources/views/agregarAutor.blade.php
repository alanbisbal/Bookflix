@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Bienvenido {{auth()->user()->name}}
                  @if (auth()->user()->es_admin)
                    <a class="nav-link" href="{{route('administracion')}}">Tareas administrativas</a>
                  @endif
                 </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

              <form action="{{'autoresCargados'}}" method="POST" enctype="multipart/form-data">

                {{csrf_field()}}

                @error('nombre')
                @enderror
                <label for="nombre">{{'Nombre de Autor: '}}</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
              </br>

                @if($errors->has('nombre'))
                <div class="alert alert-danger" role="alert">
                  Nombre no puede estar vacio</br>
                  </div>

                @endif
                <input type="submit" class="btn btn-primary" value="Agregar">
              </form>



                          </div>
                      </div>
                  </div>
              </div>
@endsection
