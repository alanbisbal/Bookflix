@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-agregarNovedad.css">

  <div class="col-md-8">
    <div class="card" >
      <div class="card-header">
        <h3>
          Agregar novedad:
        </h3>
        @include('vistas-includes.cabecera-tarjeta')
      </div>
      <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <form action="{{'novedadesCargados'}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="contenedor-items">
            <div class="item1">
                @error('titulo')
                @enderror
              <div class="nombre">
                <label class="nombre" for="titulo"><h5>{{'Título:    '}}</h5></label>
              </div>
              <div class="texto">
                <input class="texto" type="text" name="titulo" id="titulo" value="{{old('titulo')}}">                    
              </div>
              @if($errors->has('titulo'))
                El titulo no puede estar vacio
              @endif             
            </div> 
            <div class="item2">
              @error('desc')
              @enderror
              <div class="nombre">
                <label for="desc"><h5>{{'Descripción: '}}</h5></label>
              </div>
              <div class="texto">
                <input class="labels" type="text" name="desc" id="desc" value="{{old('desc')}}">              
              </div>
              @if($errors->has('desc'))
                La descripcion no puede estar vacia
              @endif            
            </div>   
          </div> 
          <div class="item3">
            <input type="submit" value="Agregar novedad">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection