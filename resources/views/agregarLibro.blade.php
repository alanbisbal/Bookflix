@extends('layouts.app')

<link rel="stylesheet" href="css/estilos-agregarLibro.css">

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card" >
        <div class="card-header">
          <h3>Agregar libro:</h3>
           @if (auth()->user()->es_admin)
            <a class="nav-link" href="{{route('administracion')}}">
              Tareas administrativas
            </a>
          @endif
        </div>
        <div class="tarjetasanidadas">
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <div>
              <form class="form-group "action="{{'librosCargados'}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                @error('isbn')
                @enderror
                <label for="isbn"  class="btn btn-secondary">{{'ISBN:'}}</label>
                <input type="text" name="isbn" id="isbn" placeholder="ISBN" value="{{ old('isbn') }}">
                @if($errors->has('isbn'))
                  <div class="alert alert-danger" role="alert">
                    El ISBN no puede estar vacío
                  </div>
                @endif
                @error('titulo')
                @enderror
                <label for="titulo" class="btn btn-secondary">{{'Título:'}}</label>
                <input type="text" name="titulo" id="titulo" placeholder="Título" value="{{ old('titulo') }}">
                @if($errors->has('titulo'))
                  <div class="alert alert-danger" role="alert">
                    El título no puede estar vacío
                  </div>
                @endif
                @error('desc')
                @enderror
                <label for="desc" class="btn btn-secondary">{{'Descripción:'}}</label>
                <input type="text" name="desc" id="desc" placeholder="Descripción" value="{{ old('desc') }}">
                @if($errors->has('desc'))
                  <div class="alert alert-danger" role="alert">
                    La descripción no puede estar vacía
                  </div>
                @endif
                @error('img_libro')
                @enderror
                <label for="img_libro" class="btn btn-secondary">{{'Portada del libro:'}}</label>
                <input accept="image/*" type="file" name="img_libro" >
                @if($errors->has('img_libro'))
                  <div class="alert alert-danger" role="alert">
                    La imagen no puede estar vacía.
                  </div>
                @endif
                @error('pdf')
                @enderror
                <label for="pdf" class="btn btn-secondary">{{'PDF del libro:'}}</label>
                <input accept="application/pdf" type="file" name="pdf" >
                @if($errors->has('pdf'))
                  <div class="alert alert-danger" role="alert">
                    El pdf no puede estar vacío
                  </div>
                @endif
                @error('titulo_trailer')
                @enderror
                <label for="titulo_trailer" class="btn btn-secondary">{{'Título del trailer:'}}</label>
                <input type="text" name="titulo_trailer" id="titulo_trailer" placeholder="Título del trailer" value="{{ old('titulo_trailer') }}">
                @if($errors->has('titulo_trailer'))
                  <div class="alert alert-danger" role="alert">
                    El titulo del trailer no puede estar vacio
                  </div>
                @endif
                @error('desc_trailer')
                @enderror
                <label for="desc_trailer" class="btn btn-secondary">{{'Descripción del trailer:'}}</label>
                <input type="text" name="desc_trailer" id="desc_trailer" placeholder="Descripción del trailer" value="{{ old('desc_trailer') }}">
                @if($errors->has('desc_trailer'))
                  <div class="alert alert-danger" role="alert">
                    La descripcion del trailer no puede estar vacio
                  </div>
                @endif
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
  </div>
@endsection
