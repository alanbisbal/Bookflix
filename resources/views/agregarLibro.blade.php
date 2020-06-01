@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-agregarLibro.css">

  <div class="col-md-8">
    <div class="card" >
      <div class="card-header">
        <h3>Agregar libro:</h3>
        @include('vistas-includes.cabecera-tarjeta')
      </div>
      <div class="tarjetasanidadas">
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
            <form class="form-group "action="{{'librosCargados'}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <label for="isbn"  class="btn btn-secondary">{{'ISBN:'}}</label>
              <input type="text" name="isbn" id="isbn" placeholder="ISBN" value="{{ old('isbn') }}">
              <label for="titulo" class="btn btn-secondary">{{'Título:'}}</label>
              <input type="text" name="titulo" id="titulo" placeholder="Título" value="{{ old('titulo') }}">
              <label for="desc" class="btn btn-secondary">{{'Sinopsis:'}}</label>
              <input type="text" name="desc" id="desc" placeholder="Sinopsis" value="{{ old('desc') }}">
              <label for="img_libro" class="btn btn-secondary">{{'Portada del libro:'}}</label>
              <input accept="image/*" type="file" name="img_libro" >
              <label for="pdf" class="btn btn-secondary">{{'PDF del libro:'}}</label>
              <input accept="application/pdf" type="file" name="pdf" >
              <label for="titulo_trailer" class="btn btn-secondary">{{'Título del trailer:'}}</label>
              <input type="text" name="titulo_trailer" id="titulo_trailer" placeholder="Título del trailer" value="{{ old('titulo_trailer') }}">
              <label for="desc_trailer" class="btn btn-secondary">{{'Descripción del trailer:'}}</label>
              <input type="text" name="desc_trailer" id="desc_trailer" placeholder="Descripción del trailer" value="{{ old('desc_trailer') }}">
              <label for="img_trailer" class="btn btn-secondary">{{'Imagen del trailer:'}}</label>
              <input accept="image/*" type="file" name="img_trailer" >
              <label for="idautor" class="btn btn-secondary">{{'Autor:'}}</label>
              <select name="idautor" >
                @foreach($autores as $autor)
                  <option value="{{$autor->id}}">{{$autor->nombre}}</option>
                @endforeach
              </select>
              <label for="idEditorial" class="btn btn-secondary">{{'Editorial:'}}</label>
              <select name="idEditorial">
                @foreach($editoriales as $editorial)
                  <option value="{{$editorial->id}}">{{$editorial->nombre}}</option>
                @endforeach
              </select>
              <label for="idGenero" class="btn btn-secondary">{{'Género:'}}</label>
              <select name="idGenero">
                @foreach($generos as $genero)
                  <option value="{{$genero->id}}">{{$genero->nombre}}</option>
                @endforeach
              </select>
              <input type="submit" value="Agregar">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
