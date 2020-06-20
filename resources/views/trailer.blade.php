@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/estilos-trailer.css">

    <div class="col-md-11">
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
      @endforeach
      <div class="card">
        <!--<div class="card-header">
          <h3>
            {{$libro->titulo}}
          </h3>
          @include('vistas-includes.cabecera-tarjeta')
        </div>-->
        <div class="card-body cb">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <div class="fila1">
            <div class="portada">
              <img src="{{asset('storage').'/'.$libro->img_libro}}"alt="" width="100">
              <img src="{{asset('storage').'/'.$libro->img_trailer}}"alt="" width="100">
            </div>
            <div class="medio">
              <div class="titulo">
                <h1>
                  <i><b>{{$libro->titulo}}</b></i>
                </h1>
                <h3>
                  {{$libro->titulo_trailer}}
                </h3>
              </div>
              <div class="continuarleyendo">
                @if(!($leido)->isEmpty())
                  <a href="{{asset('storage').'/'.$leido->first()->desde}}">
                    Continuar leyendo
                  </a>
                @endif
              </div>
              <div class="desctrailer">
                {{$libro->desc_trailer}}
              </div>
              <div class="vermas">
                <!-- esto es del script -->
                <p>
                  <a href="javascript:mostrar();">
                    Ver Detalle
                  </a>
                </p>
                <div id="flotante" style="display:none;">
                  {{$libro->desc}}
                  <div id="close" class="closea">
                    <a href="javascript:cerrar();">
                      Cerrar Detalle
                    </a>
                  </div>
                </div>
              </div>
              <div class="titcapitulos">
                <h3>
                  Capítulos:
                </h3>
              </div>
              <div class="capitulos">
                @if(count($capitulos) == 1)
                  <form action="{{route('libroLeido')}}" method="post">
                    {{csrf_field()}}
                    PDF:
                    <a  href="{{asset('storage').'/'.$capitulos->first()->capitulo}}">
                      Leer libro
                    </a>
                    <input type="hidden" name="cap" id="cap" value="  {{ $capitulos->first()->capitulo}}">
                    <input type="hidden" name="idLibro" id="idLibro" value="{{ $libro->id }}">
                    <button type="submit">
                      Leer
                    </button>
                  </form>
                @else
                  @foreach($capitulos as $capitulo)
                    <div class="cap">
                      <h6>Título:<i> {{$capitulo->titulo}}</i></h6>
                      <form action="{{route('libroLeido')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="cap" id="cap" value="{{ $capitulo->capitulo }}">
                        <input type="hidden" name="idLibro" id="idLibro" value="{{ $libro->id }}">
                        <button type="submit">Leer</button>
                      </form>
                    </div>
                  @endforeach
                @endif
              </div>
            </div>
            <div class="derecha">
              <div class="card">
                <div class="card-header">
                  <h5>Ficha técnica:</h5>
                </div>
                <div class="card-body">
                  ISBN: {{$libro->isbn}}
                  </br>
                  Editorial: {{$libro->editorialL->nombre}}
                  </br>
                  Autor: {{$libro->autorL->nombre}}
                  </br>
                  Genero: {{$libro->generoL->nombre}}
                </div>
              </div>
              <div class="fav">
                @if($favs->isEmpty())
                  <form  action="{{route('agregarFavorito')}}" method="POST">
                    {{csrf_field()}}
                    <label for="idLibro"></label>
                    <input type="hidden" name="idLibro" id="idLibro" value="{{ $libro->id }}">
                    <button type="submit" class="activo btn-info btn">
                      Agregar a favoritos ★
                    </button>
                  </form>
                @else
                  <form  action="{{route('eliminarFavorito')}}" method="POST">
                    {{csrf_field()}}
                    <label for="idLibro"></label>
                    <input type="hidden" name="idLibro" id="idLibro" value="{{ $libro->id }}">
                    <button  type="submit" class="valoracion btn  btn-info">
                      Eliminar de favoritos ★
                    </button>
                  </form>
                @endif
              </div>
              <div class="mostrarcalificacion">
                </br>
                <h5>Calificación:</h5>
                <div class="valoracion">
                  @for($i=0; $i < $libro->califProm() ; $i++)
                    <h4 class="activo">
                      ★
                    </h4>
                  @endfor
                  @for ($i; $i < 5 ; $i++)
                    <h4 style="color:grey" class=" valoracion">
                      ★
                    </h4>
                  @endfor
                  <!--
                  <h5 style="font-size:16px">
                    ({{$libro->califProm()}}/5)
                  </h5>
                  -->
                </div>
              </div>
              <div class="calificar">
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
            </div>
          </div>
          <div class="fila2">
            <div class="comentarios">
              <h3>Comentarios:</h3>
              @foreach($comentarios as $comentario)
                <div class="com">
                  <span>Hecho por <b>{{$comentario->perfil->nombre}}</b> el <b>{{$comentario->created_at}}</b></span>
                  <textarea rows="5" cols="25" disabled="yes">
                    {{$comentario->desc}}
                  </textarea>
                </div>
              @endforeach
              @if($coment->isEmpty())
                <div class="comentar">
                  <form action="{{route('agregarComentario')}}" method="POST">
                    {{csrf_field()}}
                    <textarea name="desc" rows="5" cols="50" placeholder="Escribir un comentario"></textarea>
                    <label for="idLibro"></label>
                    <input type="hidden" name="idLibro" id="idLibro" value="{{ $libro->id }}">
                    <div class="boton">
                      <button class="btn btn-info" type="submit">
                        Enviar
                      </button>
                    </div>
                  </form>
                </div>
              @else
                {{'Usted ya comentó este libro'}}
              @endif
            </div>
          </div>
        </div>
        <div class="botonvolver">
          <a href="{{url('/home')}}" class="btn btn-info" role="button">
            Volver
          </a>
        </div>
      </div>
    </div>

@endsection
