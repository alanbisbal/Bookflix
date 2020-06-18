@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-agregarLibro.css">

  <!--<div class="col-md-8">-->
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
            <form class="form-group formulario" action="{{'guardarLibro'}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="formulario">
                <div class="parte1">
                  <div class="p11">
                    <label for="titulo" class="btn btn-secondary">{{'Título:'}}</label>
                    <input type="text" class= "col-md-8" name="titulo" id="titulo" placeholder="Título" value="{{ old('titulo') }}">
                  </div>
                  <div class="p21">
                    <label for="isbn"  class="btn btn-secondary">{{'ISBN:'}}</label>
                    <input type="text" class= "col-md-9" name="isbn" id="isbn" placeholder="ISBN" value="{{ old('isbn') }}">
                  </div>
                </div>
                <div class="parte2">
                  <label for="desc" class="btn btn-secondary">{{'Sinopsis:'}}</label>
                  <textarea rows="7" cols="60" type="text" name="desc" id="desc" placeholder="Sinopsis" value="{{ old('desc') }}"></textarea>
                </div>
                <div class="parte3">
                  <div class="p13">
                    <label for="img_libro" class="btn btn-secondary">{{'Portada del libro:'}}</label>
                    <input accept="image/*" type="file" name="img_libro">
                  </div>
                  <div class="p23">
                    <label for="idautor" class="btn btn-secondary">{{'Autor:'}}</label>
                    <select name="idautor" >
                      @foreach($autores as $autor)
                        <option value="{{$autor->id}}">{{$autor->nombre}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="parte4">
                  <div class="p14">
                    <label for="idEditorial" class="btn btn-secondary">{{'Editorial:'}}</label>
                    <select name="idEditorial">
                      @foreach($editoriales as $editorial)
                        <option value="{{$editorial->id}}">{{$editorial->nombre}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="p24">
                    <label for="idGenero" class="btn btn-secondary">{{'Género:'}}</label>
                    <select name="idGenero">
                      @foreach($generos as $genero)
                        <option value="{{$genero->id}}">{{$genero->nombre}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="parte5">
                  <label for="titulo_trailer" class="btn btn-secondary">{{'Título del trailer:'}}</label>
                  <input class= "col-md-9" type="text" name="titulo_trailer" id="titulo_trailer" placeholder="Título del trailer" value="{{ old('titulo_trailer') }}">
                </div>
                <div class="parte6">
                  <label for="img_trailer" class="btn btn-secondary">{{'Imagen del trailer:'}}</label>
                  <input class= "col-md-9"  accept="image/*" type="file" name="img_trailer">
                </div>
                <div class="parte7">
                  <label for="desc_trailer" class="btn btn-secondary">{{'Descripción del trailer:'}}</label>
                  <textarea rows="4" cols="60" type="text" name="desc_trailer" id="desc_trailer" placeholder="Descripción del trailer" value="{{ old('desc_trailer') }}"></textarea>
                </div>
                <div class="parte8">          
                  <!--<button type="submit" value="Agregar"></button>-->
                  <a href="{{'librosCargados'}}" class="btn btn-info" role="button">
                    Volver
                  </a>
                  <button class="btn btn-info" type="submit" value="Agregar">
                    Agregar libro
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <!--</div>-->
@endsection
