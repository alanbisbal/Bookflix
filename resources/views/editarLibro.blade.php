@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/css/estilos-editarLibro.css">

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
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endforeach
                <form action="{{ route('libro.update', $libro,$libro->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="formulario">
                        <div class="parte1izq">
                            <label for="titulo" class="btn btn-secondary">
                                {{'Título:'}}
                            </label>
                            <input type="text" name="titulo" id="titulo"  value="{{ $libro->titulo }}">
                        </div>
                        <div class="parte1der">
                            <label for="isbn" class="btn btn-secondary">
                                {{'ISBN:'}}
                            </label>
                            <input type="text" name="isbn" id="isbn" value="{{ $libro->isbn}}">
                        </div>
                        <div class="parte2">
                            <label for="desc" class="btn btn-secondary">
                                {{'Sinopsis:'}}
                            </label>
                            <textarea rows="7" cols="60" type="text" name="desc" id="desc" >
                                {{$libro->desc}}
                            </textarea>
                        </div>
                        <div class="parte3izq">
                            <div class="parte3izq1">
                                <label for="img_libro" class="btn btn-secondary">
                                    {{'Portada del libro:'}}
                                </label>
                                <img src="{{asset('storage').'/'.$libro->img_libro}}"alt="" width="100">
                            </div>
                            <input accept="image/*" type="file" name="img_libro" value="{{$libro->img_libro}}">
                        </div>
                        <div class="parte3der">
                            <div class="parte3derelem">
                                <label for="idautor" class="btn btn-secondary">
                                    {{'Autor:'}}
                                </label>
                                <select name="idautor" >
                                    @foreach($autores as $autor)
                                        @if($autor->id == $libro->idautor)
                                            <option value="{{$autor->id}}" selected="{{$autor->nombre}}">
                                                {{$autor->nombre}}
                                            </option>
                                        @else
                                            <option value="{{$autor->id}}">
                                                {{$autor->nombre}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="parte3derelem">
                                <label for="idEditorial" class="btn btn-secondary">
                                    {{'Editorial:'}}
                                </label>
                                <select name="idEditorial" value="{{$libro->idEditorial}}">
                                    @foreach($editoriales as $editorial)
                                        @if($editorial->id == $libro->idEditorial)
                                            <option value="{{$editorial->id}}" selected="{{$editorial->nombre}}">
                                                {{$editorial->nombre}}
                                            </option>
                                        @else
                                            <option value="{{$editorial->id}}">
                                                {{$editorial->nombre}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="parte3derelem">
                                <label for="idGenero" class="btn btn-secondary">
                                    {{'Género:'}}
                                </label>
                                <select name="idGenero"  >
                                    @foreach($generos as $genero)
                                        @if($genero->id == $libro->idGenero)
                                            <option value="{{$genero->id}}" selected="{{$genero->nombre}}">
                                                {{$genero->nombre}}
                                            </option>
                                        @else
                                            <option value="{{$genero->id}}">
                                                {{$genero->nombre}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="parte4izq">
                            <label for="titulo_trailer" class="btn btn-secondary">
                                {{'Título de trailer:'}}
                            </label>
                            <div class="parte4izq1">
                                <input type="text" name="titulo_trailer" id="titulo_trailer" value="{{ $libro->titulo_trailer }}">
                            </div>
                            <div class="parte4izq2">
                                <label for="img_trailer" class="btn btn-secondary">
                                    {{'Imagen de trailer:'}}
                                </label>
                                <img src="{{asset('storage').'/'.$libro->img_trailer}}"alt="" width="100">
                            </div>
                            <div class="parte4izq3">
                                <input accept="image/*" type="file" name="img_trailer" value="{{$libro->img_trailer}}">
                            </div>
                        </div>
                        <div class="parte4der">
                            <label for="desc_trailer " class="btn btn-secondary">
                                {{'Descripción de trailer:'}}
                            </label>
                            <textarea rows="10" cols="40" type="text" name="desc_trailer" id="desc_trailer">
                                {{$libro->desc_trailer}}
                            </textarea>
                        </div>
                        <div class="parte5">
                            <a href="{{url('/librosCargados')}}" class="btn btn-info" role="button">
                                Volver
                            </a>
                            <button class="btn btn-warning btn-block" type="submit">
                                Editar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
