@extends('plantilla')

@section('seccion')
<div class="container">
    <a class="navbar-brand" href="{{ url('/home') }}">
        Bookflix
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
</div>
  <h1>Editar libro</h1>
  @if (session('mensaje'))
      <div class="alert alert-success">
          {{ session('mensaje') }}
      </div>
  @endif
  <form action="{{ route('libro.update', $libro->id) }}" method="POST">
    @method('PUT')
    @csrf
    ISBN:
    @error('isbn')
        <div class="alert alert-danger">
            El nombre es obligatorio
        </div>
    @enderror
    <input type="text" name="isbn" placeholder="isbn" class="form-control mb-2" value="{{ $libro->isbn }}">


    TITULO:
    @error('titulo')
        <div class="alert alert-danger">
            El titulo es obligatorio
        </div>
    @enderror
    <input type="text" name="titulo" placeholder="titulo" class="form-control mb-2" value="{{ $libro->titulo }}">

    DESCIPCION:
    @error('desc')
        <div class="alert alert-danger">
            La descripcion es obligatoria
        </div>
    @enderror
    <input type="text" name="desc" placeholder="desc" class="form-control mb-2" value="{{ $libro->desc }}">


    IMAGEN:
    @error('img_libro')
        <div class="alert alert-danger">
            La portada es obligatoria
        </div>
    @enderror
    <label for="img_trailer">{{'Imagen de trailer: '}}</label></br>
    <img src="{{asset('storage').'/'.$libro->img_libro}}"alt="" width="100">

    <input accept="image/*" type="file" name="img_trailer" >

    TITULO DE TRAILER
    @error('titulo_trailer')
        <div class="alert alert-danger">
            El titulo del trailer es obligatorio
        </div>
    @enderror
    <input type="text" name="titulo_trailer" placeholder="titulo_trailer" class="form-control mb-2" value="{{ $libro->titulo_trailer }}">




    DESCIPCION DE TRAILER
    @error('desc_trailer')
        <div class="alert alert-danger">
            La descripcion del trailer es obligatoria
        </div>
    @enderror
    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $libro->desc_trailer }}">



    @error('nombre')
        <div class="alert alert-danger">
            El nombre es obligatorio
        </div>
    @enderror
    <label for="img_trailer">{{'Imagen de trailer: '}}</label></br>
    <img src="{{asset('storage').'/'.$libro->img_trailer}}"alt="" width="100">
    <input accept="image/*" type="file" name="img_trailer" >



    EDITORIAL:
    </br>
    <label for="editorial">{{'Editorial: '}}</label>
    <select name="editorial">
      @foreach($editoriales as $editorial)
         <option value="{{$editorial->id}}" selected="{{$libro->editorial}}">{{$editorial->nombre}}</option>
      @endforeach
    </select>


    AUTOR:
    </br>
    <label for="idautor">{{'Autor: '}}</label>
    <select name="idautor">
      @foreach($autores as $autor)
         <option value="{{$autor->id}}" selected="{{$libro->idautor}}">{{$autor->nombre}}</option>
      @endforeach
    </select>

    GENERO
  </br>
    <label for="genero">{{'Genero: '}}</label>
    <select name="genero">
      @foreach($generos as $genero)
         <option value="{{$genero->id}}" selected="{{$libro->genero}}">{{$genero->nombre}}</option>
      @endforeach
    </select>




    <button class="btn btn-warning btn-block" type="submit">Editar</button>
  </form>
@endsection
