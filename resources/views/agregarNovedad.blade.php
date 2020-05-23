@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="height: 60%">
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


              <form action="{{'novedadesCargados'}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                @error('titulo')
                @enderror
                <label for="titulo">{{'Titulo:    '}}</label>
                <input type="text" name="titulo" id="titulo" value="{{old('titulo')}}">
                </br>
                @if($errors->has('titulo'))
                  El titulo no puede estar vacio
                @endif
              </br>
                @error('desc')
                @enderror

                <label for="desc">{{'descripcion: '}}</label>
                <input type="textarea" name="desc" id="desc" value="{{old('desc')}}">
              </br>

                @if($errors->has('desc'))
                    La descripcion no puede estar vacia
                @endif
                </br>
                <input type="submit" value="Agregar">
              </form>




            </div>
        </div>
    </div>
</div>
@endsection
