@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-editarLibro.css">

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
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endforeach
                <!--
                <form action="{{ route('libro.update', $libro->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <label for="isbn">{{'ISBN: '}}</label>
                    <input type="text" name="isbn" id="isbn" value="{{ $libro->isbn}}">

                    <label for="titulo">{{'Titulo: '}}</label>
                    <input type="text" name="titulo" id="titulo"  value="{{ $libro->titulo }}">

                    <label for="desc">{{'desc: '}}</label>
                    <input type="text" name="desc" id="desc" value="{{ $libro->desc }}">

                    <label for="img_libro" class="btn btn-secondary">{{'Portada del libro '}}</label>
                    <img src="{{asset('storage').'/'.$libro->img_libro}}"alt="" width="100">
                    <input accept="image/*" type="file" name="img_libro" value="{{$libro->img_libro}}">

                    <label for="pdf" class="btn btn-secondary">{{'pdf de libro '}}</label>
                    <a href="{{asset('storage').'/'.$libro->pdf}}" >{{$libro->titulo}}</a>
                    <input accept="application/pdf" type="file" name="pdf"  value="{{$libro->pdf}}">

                    <label for="titulo_trailer">{{'Titulo de trailer: '}}</label>
                    <input type="text" name="titulo_trailer" id="titulo_trailer" value="{{ $libro->titulo_trailer }}">
                    <label for="desc_trailer">{{'Descripcion de trailer: '}}</label>
                    <input type="text" name="desc_trailer" id="desc_trailer" value="{{ $libro->desc_trailer }}">
                    
                    <label for="img_trailer" class="btn btn-secondary">{{'Imagen de trailer '}}</label>
                    <img src="{{asset('storage').'/'.$libro->img_trailer}}"alt="" width="100">
                    <input accept="image/*" type="file" name="img_trailer" value="{{$libro->img_trailer}}">

                    <label for="idEditorial">{{'Editorial: '}}</label>
                    <select name="idEditorial" value="{{$libro->idEditorial}}">
                        @foreach($editoriales as $editorial)
                            @if($editorial->id == $libro->idEditorial)
                                <option value="{{$editorial->id}}" selected="{{$editorial->nombre}}">{{$editorial->nombre}}</option>
                            @else
                                <option value="{{$editorial->id}}" >{{$editorial->nombre}}</option>
                            @endif
                        @endforeach
                    </select>

                    <label for="idautor">{{'Autor: '}}</label>
                    <select name="idautor" >
                        @foreach($autores as $autor)
                            @if($autor->id == $libro->idautor)
                                <option value="{{$autor->id}}" selected="{{$autor->nombre}}">{{$autor->nombre}}</option>
                            @else
                                <option value="{{$autor->id}}" >{{$autor->nombre}}</option>
                            @endif
                        @endforeach
                    </select>

                    <label for="idGenero">{{'Genero: '}}</label>
                    <select name="idGenero"  >
                        @foreach($generos as $genero)
                            @if($genero->id == $libro->idGenero)
                                <option value="{{$genero->id}}" selected="{{$genero->nombre}}">{{$genero->nombre}}</option>
                            @else
                                <option value="{{$genero->id}}" >{{$genero->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                -->
                <form action="{{ route('libro.update', $libro,$libro->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                
                
                
                    <label for="isbn" class="btn btn-secondary">{{'ISBN: '}}</label>
                    <input type="text" name="isbn" id="isbn" value="{{ $libro->isbn}}">
                
                          
                          
                    <label for="titulo" class="btn btn-secondary">{{'Titulo: '}}</label>
                    <input type="text" name="titulo" id="titulo"  value="{{ $libro->titulo }}">
                
                          
                          
                    <label for="desc" class="btn btn-secondary">{{'desc: '}}</label>
                    <input type="text" name="desc" id="desc" value="{{ $libro->desc }}">
                
                          
                          
                
                    <label for="img_libro" class="btn btn-secondary">{{'Portada del libro '}}</label>
                    <img src="{{asset('storage').'/'.$libro->img_libro}}"alt="" width="100">  
                    <input accept="image/*" type="file" name="img_libro" value="{{$libro->img_libro}}">

                
                    <label for="pdf" class="btn btn-secondary">{{'pdf de libro '}}</label>
                    <a href="{{asset('storage').'/'.$libro->pdf}}" >{{$libro->titulo}}</a>
                    <input accept="application/pdf" type="file" name="pdf"  value="{{$libro->pdf}}">
                

                
                    <label for="titulo_trailer" class="btn btn-secondary">{{'Titulo de trailer: '}}</label>
                    <input type="text" name="titulo_trailer" id="titulo_trailer" value="{{ $libro->titulo_trailer }}">

                
                    <label for="desc_trailer " class="btn btn-secondary">{{'Descripcion de trailer: '}}</label>
                    <input type="text" name="desc_trailer" id="desc_trailer" value="{{ $libro->desc_trailer }}">
                

                
                    <label for="img_trailer" class="btn btn-secondary">{{'Imagen de trailer '}}</label>
                    <img src="{{asset('storage').'/'.$libro->img_trailer}}"alt="" width="100">  
                    <input accept="image/*" type="file" name="img_trailer" value="{{$libro->img_trailer}}">

                
                    <label for="idEditorial" class="btn btn-secondary">{{'Editorial: '}}</label>
                    <select name="idEditorial" value="{{$libro->idEditorial}}">
                      @foreach($editoriales as $editorial)
                          @if($editorial->id == $libro->idEditorial)
                          <option value="{{$editorial->id}}" selected="{{$editorial->nombre}}">{{$editorial->nombre}}</option>
                          @else
                          <option value="{{$editorial->id}}" >{{$editorial->nombre}}</option>
                          @endif
                      @endforeach
                    </select>
                                    
                
                    <label for="idautor" class="btn btn-secondary">{{'Autor: '}}</label>
                    <select name="idautor" >
                      @foreach($autores as $autor)
                          @if($autor->id == $libro->idautor)
                          <option value="{{$autor->id}}" selected="{{$autor->nombre}}">{{$autor->nombre}}</option>
                          @else
                          <option value="{{$autor->id}}" >{{$autor->nombre}}</option>
                          @endif
                      @endforeach
                    </select>
                

                    <label for="idGenero" class="btn btn-secondary">{{'Genero: '}}</label>
                    <select name="idGenero"  >
                      @foreach($generos as $genero)
                         @if($genero->id == $libro->idGenero)
                         <option value="{{$genero->id}}" selected="{{$genero->nombre}}">{{$genero->nombre}}</option>
                         @else
                         <option value="{{$genero->id}}" >{{$genero->nombre}}</option>
                         @endif
                      @endforeach
                    </select>


                    <button class="btn btn-warning btn-block" type="submit">Editar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
