@extends('layouts.app')

<link rel="stylesheet" href="css/estilos-editarLibro.css">

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> 
                    <h3>
                        Editar libro:
                    </h3>
                    @include('vistas-includes.cabecera-tarjeta')
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Editar libro</h1>
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
                        @error('titulo')
                            <div class="alert alert-danger">
                                El titulo es obligatorio
                            </div>
                        @enderror
                        <label for="titulo">{{'Titulo: '}}</label>
                        <input type="text" name="titulo" id="titulo"  value="{{ $libro->titulo }}">
                        @error('desc')
                            <div class="alert alert-danger">
                                La descripcion es obligatoria
                            </div>
                        @enderror
                        <label for="desc">{{'desc: '}}</label>
                        <input type="text" name="desc" id="desc" value="{{ $libro->desc }}">
                        @error('img_libro')
                            <div class="alert alert-danger">
                                La portada es obligatoria
                            </div>
                        @enderror
                        <img src="{{asset('storage').'/'.$libro->img_libro}}"alt="" width="100">
                        <label for="img_libro">{{'Portada del libro: '}}</label>
                        <input accept="image/*" type="file" name="img_libro" >
                        @error('titulo_trailer')
                            <div class="alert alert-danger">
                                El titulo del trailer es obligatorio
                            </div>
                        @enderror
                        <label for="titulo_trailer">{{'Titulo de trailer: '}}</label>
                        <input type="text" name="titulo_trailer" id="titulo_trailer" value="{{ $libro->titulo_trailer }}">
                        @error('desc_trailer')
                            <div class="alert alert-danger">
                                La descripcion del trailer es obligatoria
                            </div>
                        @enderror
                        <label for="desc_trailer">{{'Descripcion de trailer: '}}</label>
                        <input type="text" name="desc_trailer" id="desc_trailer" value="{{ $libro->desc_trailer }}">
                        @error('desc_trailer')
                            <div class="alert alert-danger">
                                es obligatorio
                            </div>
                        @enderror
                        <img src="{{asset('storage').'/'.$libro->img_trailer}}"alt="" width="100">
                        <label for="img_trailer">{{'Imagen de trailer: '}}</label>
                        <input accept="image/*" type="file" name="img_trailer" >
                        <label for="idEditorial">{{'Editorial: '}}</label>
                        <select name="idEditorial" selected="{{$libro->idEditorial}}">
                            @foreach($editoriales as $editorial)
                                <option value="{{$editorial->id}}" >{{$editorial->nombre}}</option>
                            @endforeach
                        </select>
                        <label for="idautor">{{'Autor: '}}</label>
                        <select name="idautor" selected="{{$libro->idautor}}">
                            @foreach($autores as $autor)
                                <option value="{{$autor->id}}" >{{$autor->nombre}}</option>
                            @endforeach
                        </select>
                        <label for="idGenero">{{'Genero: '}}</label>
                        <select name="idGenero" selected="{{$libro->idGenero}}">
                            @foreach($generos as $genero)
                                <option value="{{$genero->id}}" >{{$genero->nombre}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-warning btn-block" type="submit">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
