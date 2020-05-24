@extends('layouts.app')

<link rel="stylesheet" href="css/estilos-agregarNovedad.css">

@section('content')
<div class="menu">
  <div class="background-overlay">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header"><h3>Nueva novedad:</h3>
                  @if (auth()->user()->es_admin)
                    <a class="nav-link" href="{{route('administracion')}}">Tareas administrativas</a>
                  @endif
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
    </div>
  </div>
</div>
@endsection