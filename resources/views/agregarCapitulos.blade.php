@extends('layouts.app')

@section('content')

      <div class="col-md-8">
          <div class="card">
              <div class="card-header">
                <h3>
                  Agregar un capítulo:
                </h3>
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
                    <form action="{{route('agregar.capitulo')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}


                        <label for="titulo">{{'Titulo del capitulo: '}}</label>
                        <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}">

                        <label for="idLibro"></label>
                        <input type="hidden" name="idLibro" id="idLibro" value="{{ $idLibro }}">
                        </br>
                        <label for="capitulo">{{'PDF del capitulo: '}}</label>
                        <input accept="application/pdf" type="file" name="capitulo" id="capitulo" value="{{ old('capitulo') }}">

                      </br>

                        <input type="submit" class="btn btn-primary" value="Agregar">
                  </form>
                  <div style="margin-left: 500px">
          <a type="submit" href="{{url('/librosCargados')}}" class="btn btn-primary" value="Finalizar">Fin</a>
        </div>
            </div>
        </div>
    </div>

@endsection


<!--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header" style="display:flex; justify-content: space-between;"> <h3 style="display:flex">Bienvenido {{auth()->user()->name}}</h3>
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

            <form action="{{route('agregar.capitulo')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}


            <label for="titulo">{{'Titulo del capitulo: '}}</label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}">

            <label for="idLibro"></label>
            <input type="hidden" name="idLibro" id="idLibro" value="{{ $idLibro }}">
            </br>
            <label for="capitulo">{{'PDF del capitulo: '}}</label>
            <input accept="application/pdf" type="file" name="capitulo" id="capitulo" value="{{ old('capitulo') }}">

          </br>

            <input type="submit" class="btn btn-primary" value="Agregar">
          </form>
              <button type="submit" href="route('librosCargados')" class="btn btn-primary" value="Finalizar">
                Fin
              </button>
            </div>
        </div>
    </div>
</div>
@endsection-->