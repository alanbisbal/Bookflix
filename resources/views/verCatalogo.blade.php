@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/css/estilos-verCatalogo.css">

  <!-- PANEL DE FILTROS -->
  <div class="cont">
    <div class="card cb2">
      <div class="card-header">
          <h5>Filtros de búsqueda</h5>
      </div>
      <form  action="{{'catalogoFiltrado'}}" method="post" >
        @csrf
        <div class="tarjetasanidadas">
          <div class="filtro">
            <span class="nombre-filtro">Género:</span>
            <select name="genero" value="">
              <option  selected value> Seleccione una opción </option>
              @foreach($generos as $genero)
                <div class="text-dark tarjetaanidada-una">
                  <div class="card-body">
                    <ul>
                      <option value="{{$genero->id}}">
                        {{$genero->nombre}}
                      </option>
                    </ul>
                  </div>
                </div>
              @endforeach
            </select>
          </div>
          <div class="filtro verde">
            <span class="nombre-filtro">Autor: </span>
            <select name="autor" >
              <option  selected value> Seleccione una opción </option>
              @foreach($autores as $autor)
                <div class="text-dark tarjetaanidada-una">
                  <div class="card-body">
                    <ul>
                      <option value="{{$autor->id}}">
                        {{$autor->nombre}}
                      </option>
                    </ul>
                  </div>
                </div>
              @endforeach          
            </select>
          </div>
          <div class="filtro">
            <span class="nombre-filtro">Editorial:</span>
            <select name="editorial">
                <option  selected value> Seleccione una opción </option>
                @foreach($editoriales as $editorial)
                  <div class="text-dark tarjetaanidada-una">
                    <div class="card-body">
                      <ul>
                        <option value="{{$editorial->id}}">{{$editorial->nombre}}</option>
                      </ul>
                    </div>
                  </div>
                @endforeach
            </select>
          </div>
          <div class="filtro verde">  
            <span class="nombre-filtro">Orden: </span>
            <select name="orden" >
              <option selected value> Seleccione una opción </option>
              <div class="text-dark tarjetaanidada-una">
                <div class="card-body">
                  <ul>
                    <option value="ASC">{{'A..Z'}}</option>
                    <option value="DESC">{{'Z..A'}}</option>
                  </ul>
                </div>
              </div>
            </select>
          </div>
        </div>
        <div class="botones">
          <a href="{{url('/home')}}" class="btn btn-info" role="button">
            Volver
          </a>
          <input type="submit" value="Enviar" class="btn btn-info">
        </div>
      </form>
    </div>
  </div>

  <!-- CATÁLOGO -->
  <div class="card cbderecha">
      <div class="card-header">
        <h3>
            Catálogo de libros
        </h3>
      </div>
      <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
          @endif
          <div class="libros">
            @if(count($libros)==0)
              <h5><i><b>No hay resultados para la búsqueda</b></i></h5>
            @else
              @foreach($libros as $libro)
                <div class="libro">
                  <a href="{{route('libro.trailer',$libro->id)}}">
                    <div class="imagen">
                      <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100" width="100">
                    </div>
                    <div class="titulo">
                      <i>
                        {{($libro->titulo)}}
                      </i>
                    </div>
                  </a>
                </div>
              @endforeach
              @endif
          </div>
      </div>
  </div>
@endsection
