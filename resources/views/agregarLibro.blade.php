@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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

                    <div >
              <form class="form-group "action="{{'librosCargados'}}" method="POST" enctype="multipart/form-data">

                {{csrf_field()}}

                @error('isbn')
                @enderror

                  <label for="isbn"  class="btn btn-secondary">{{'ISBN '}}</label></br>
                <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}">
                </br>
                @if($errors->has('isbn'))

                <div class="alert alert-danger" role="alert">
                  El ISBN no puede estar vacio</br>
                  </div>
                @endif
               </br>

               @error('titulo')
               @enderror
                <label for="titulo" class="btn btn-secondary">{{'Titulo '}}</label></br>
                <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}">
                </br>
                @if($errors->has('titulo'))
                  <div class="alert alert-danger" role="alert">
                  El titulo no puede estar vacio</br>
                  </div>
                @endif
                </br>

                @error('desc')
                @enderror
                <label for="desc" class="btn btn-secondary">{{'desc '}}</label></br>
                <input type="text" name="desc" id="desc" value="{{ old('desc') }}">
                </br>
                @if($errors->has('desc'))
                  <div class="alert alert-danger" role="alert">
                  la desc no puede estar vacio</br>
                  </div>
                @endif

                @error('img_libro')
                @enderror
                <label for="img_libro" class="btn btn-secondary">{{'Portada del libro '}}</label></br>
                <input accept="image/*" type="file" name="img_libro" >
                </br>
                @if($errors->has('img_libro'))
                  <div class="alert alert-danger" role="alert">
                  La imagen no puede estar vacia.</br>
                  </div>
                @endif
                </br>
                @error('pdf')
                @enderror
                <label for="pdf" class="btn btn-secondary">{{'pdf de libro '}}</label></br>
                <input accept="application/pdf" type="file" name="pdf" >
                </br>
                @if($errors->has('pdf'))
                  <div class="alert alert-danger" role="alert">
                   El pdf no puede estar vacio</br></br>
                   </div>
                @endif
                </br>
                @error('titulo_trailer')
                @enderror
                <label for="titulo_trailer" class="btn btn-secondary">{{'Titulo de trailer '}}</label></br>
                <input type="text" name="titulo_trailer" id="titulo_trailer" value="{{ old('titulo_trailer') }}">
                </br>
                @if($errors->has('titulo_trailer'))
                  <div class="alert alert-danger" role="alert">
                  El titulo del trailer no puede estar vacio</br></br>
                  </div>
                @endif
                </br>
                @error('desc_trailer')
                @enderror
                <label for="desc_trailer" class="btn btn-secondary">{{'Descripcion de trailer '}}</label></br>
                <input type="text" name="desc_trailer" id="desc_trailer" value="{{ old('desc_trailer') }}">
                </br>
                @if($errors->has('desc_trailer'))
                  <div class="alert alert-danger" role="alert">
                  La descripcion del trailer no puede estar vacio</br></br>
                  </div>
                @endif
                </br>
                <label for="img_trailer" class="btn btn-secondary">{{'Imagen de trailer '}}</label></br>
                <input accept="image/*" type="file" name="img_trailer" >
                </br></br>

                <label for="idautor" class="btn btn-secondary">{{'Autor'}}</label>

                <select name="idautor" >
                  @foreach($autores as $autor)
                     <option value="{{$autor->id}}">{{$autor->nombre}}</option>
                  @endforeach
                </select>
              </br></br>
                <label for="idEditorial" class="btn btn-secondary">{{'editorial '}}</label>
                <select name="idEditorial">
                  @foreach($editoriales as $editorial)
                    <option value="{{$editorial->id}}">{{$editorial->nombre}}</option>
                  @endforeach
                </select>
                </br></br>
                <label for="idGenero" class="btn btn-secondary">{{'Genero'}}</label>
                <select name="idGenero">
                  @foreach($generos as $genero)
                    <option value="{{$genero->id}}">{{$genero->nombre}}</option>
                  @endforeach
                </select>
                </br></br>
                <input type="submit" value="Agregar">
              </form>
            </div>
              </div>
                </div>


  @endsection
