@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/estilos-trailer.css">

    <div class="col-md-11">
      <div class="card">
        <div class="card-header">
          <h3>
            {{$libro->titulo}}
          </h3>
          @include('vistas-includes.cabecera-tarjeta')
        </div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
        </div>
        @if($favs->isEmpty())
          <form  action="{{route('agregarFavorito')}}" method="POST">
            {{csrf_field()}}
            <label for="idLibro"></label>
            <input type="hidden" name="idLibro" id="idLibro" value="{{ $libro->id }}">
            <button type="submit" class="activo">
              Agregar a favoritos★
            </button>
          </form>
          @if(!($leido)->isEmpty())
            <a href="{{asset('storage').'/'.$leido->first()->desde}}">
              Continuar leyendo
            </a> 
          @endif
        @else
          <form  action="{{route('eliminarFavorito')}}" method="POST">
            {{csrf_field()}}
            <label for="idLibro"></label>
            <input type="hidden" name="idLibro" id="idLibro" value="{{ $libro->id }}">
            <button style="color:grey" type="submit" class="valoracion">
              Eliminar de favoritos★
            </button>
          </form>
        @endif
        <img src="{{asset('storage').'/'.$libro->img_libro}}"alt="" width="100">
        Calificacion:
        <div class="valoracion">
          @for($i=0; $i < $libro->califProm() ; $i++)
            <span class="activo">
              ★
            </span>
          @endfor
          @for ($i; $i < 5 ; $i++)
            <span style="color:grey" class=" valoracion">
              ★
            </span>
          @endfor
          <span style="font-size:16px">
            ({{$libro->califProm()}}/5 )
          </span>
        </div>
        <!-- esto es del script -->
        <p>
          <a href="javascript:mostrar();">
            Ver Detalle
          </a>
        </p>
        <div id="flotante" style="display:none;">
          ISBN:{{$libro->isbn}}
          Editorial: {{$libro->editorialL->nombre}}
          Autor:     {{$libro->autorL->nombre}}
          Genero:    {{$libro->generoL->nombre}} 
          <div id="close">
            <a href="javascript:cerrar();">
              Cerrar Detalle
            </a>
          </div>
        </div>
        @if($califs->isEmpty())
        <form action="{{route('agregarCalificacion')}}" method="POST">
          {{csrf_field()}}
          <div class="clasificacion">
            <input id="radio1" checked class="activo" type="radio" name="valoracion" value="1">
            <label for="radio1">
              ★
            </label>
            <input id="radio2" type="radio" name="valoracion" value="2">
            <label for="radio2">
              ★
            </label>
            <input id="radio3" type="radio" name="valoracion" value="3">
            <label for="radio3">
              ★
            </label>
            <input id="radio4" type="radio" name="valoracion" value="4">
            <label for="radio4">
              ★
            </label>
            <input id="radio5" type="radio" name="valoracion" value="5">
            <label for="radio5">
              ★
            </label>
            <input type="hidden" name="idLibro" id="idLibro" value="{{ $libro->id }}">
            <button  type="submit">
              Calificar
            </button>
          </div>
        </form>
        @else
          {{'Usted ya calificó este libro'}}
        @endif
      </div>
      @if(count($capitulos) == 1)
        <form action="{{route('libroLeido')}}" method="post">
          {{csrf_field()}}
          PDF:
          <a  href="{{asset('storage').'/'.$capitulos->first()->capitulo}}">
            Leer libro
          </a>
          <input type="hidden" name="cap" id="cap" value="  {{ $capitulos->first()->capitulo }}">
          <input type="hidden" name="idLibro" id="idLibro" value="{{ $libro->id }}">
          <button type="submit">
            Leer
          </button>
        </form>
      @else
        @foreach($capitulos as $capitulo)
          <div>
            <div>
              {{$capitulo->titulo}}
              <form action="{{route('libroLeido')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="cap" id="cap" value="{{ $capitulo->capitulo }}">
                <input type="hidden" name="idLibro" id="idLibro" value="{{ $libro->id }}">
                <button type="submit">Leer</button>
              </form>
            </div>
          </div>
        @endforeach
      @endif
      Comentarios:
      @foreach($comentarios as $comentario)
        <div>
            <div>
              {{$comentario->perfil->nombre}} {{$comentario->created_at}}
              <textarea rows="5" cols="50" disabled="yes">
                {{$comentario->desc}}
              </textarea>
            </div>
        </div>
      @endforeach
      @if($coment->isEmpty())
        <form action="{{route('agregarComentario')}}" method="POST">
          {{csrf_field()}}
          <textarea name="desc" rows="5" cols="50" placeholder="Escribir un comentario"></textarea>
          <label for="idLibro"></label>
          <input type="hidden" name="idLibro" id="idLibro" value="{{ $libro->id }}">
          <button  type="submit">
            Enviar
          </button>
        </form>
      @else
        {{'Usted ya comentó este libro'}}
      @endif
    </div>

@endsection