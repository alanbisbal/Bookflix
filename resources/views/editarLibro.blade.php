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


    @error('isbn')
        <div class="alert alert-danger">
            El isbn es obligatorio
        </div>
    @enderror
    <label for="isbn">{{'ISBN: '}}</label>
    <input type="text" name="isbn" id="isbn" value="{{ $libro->isbn}}">
    </br>

    @error('titulo')
        <div class="alert alert-danger">
            El titulo es obligatorio
        </div>
    @enderror
    <label for="titulo">{{'Titulo: '}}</label>
    <input type="text" name="titulo" id="titulo"  value="{{ $libro->titulo }}">
</br>

    @error('desc')
        <div class="alert alert-danger">
            La descripcion es obligatoria
        </div>
    @enderror
    <label for="desc">{{'desc: '}}</label>
    <input type="text" name="desc" id="desc" value="{{ $libro->desc }}">
    </br>


    @error('img_libro')
        <div class="alert alert-danger">
            La portada es obligatoria
        </div>
    @enderror
    <img src="{{asset('storage').'/'.$libro->img_libro}}"alt="" width="100">
    <label for="img_libro">{{'Portada del libro: '}}</label>
    </br>
    <input accept="image/*" type="file" name="img_libro" >


</br></br>
    @error('titulo_trailer')
        <div class="alert alert-danger">
            El titulo del trailer es obligatorio
        </div>
    @enderror
    <label for="titulo_trailer">{{'Titulo de trailer: '}}</label>
    <input type="text" name="titulo_trailer" id="titulo_trailer" value="{{ $libro->titulo_trailer }}">



</br>

    @error('desc_trailer')
        <div class="alert alert-danger">
            La descripcion del trailer es obligatoria
        </div>
    @enderror
    <label for="desc_trailer">{{'Descripcion de trailer: '}}</label>
    <input type="text" name="desc_trailer" id="desc_trailer" value="{{ $libro->desc_trailer }}">

</br>

    @error('nombre')
        <div class="alert alert-danger">
            El nombre es obligatorio
        </div>
    @enderror


    <img src="{{asset('storage').'/'.$libro->img_trailer}}"alt="" width="100">
    <label for="img_trailer">{{'Imagen de trailer: '}}</label>
    <input accept="image/*" type="file" name="img_trailer" >





    </br>
    <label for="idEditorial">{{'Editorial: '}}</label>
    <select name="idEditorial" selected="{{$libro->idEditorial}}">
      @foreach($editoriales as $editorial)
         <option value="{{$editorial->id}}" >{{$editorial->nombre}}</option>
      @endforeach
    </select>


    </br>
    <label for="idautor">{{'Autor: '}}</label>
    <select name="idautor" selected="{{$libro->idautor}}">
      @foreach($autores as $autor)
         <option value="{{$autor->id}}" >{{$autor->nombre}}</option>
      @endforeach
    </select>

  </br>
    <label for="idGenero">{{'Genero: '}}</label>
    <select name="idGenero" selected="{{$libro->idGenero}}">
      @foreach($generos as $genero)
         <option value="{{$genero->id}}" >{{$genero->nombre}}</option>
      @endforeach
    </select>




    <button class="btn btn-warning btn-block" type="submit">Editar</button>
  </form>
@endsection
