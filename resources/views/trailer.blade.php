@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header" style="display:flex; justify-content: space-between;"> <h3 style="display:flex">Bienvenido {{auth()->user()->name}}</h3>
                @if (auth()->user()->es_admin)
                  <a class="nav-link" style="display:flex; align-content: center;"href="{{route('administracion')}}">Tareas administrativas</a>
                    @endif
              </div>
              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif
              </div>
              <form  action="{{route('agregarFavorito')}}" method="POST">
                {{csrf_field()}}
                <label for="idLibro"></label>
                <input type="hidden" name="idLibro" id="idLibro" value="{{ $libro->id }}">
                <button type="submit" class="activo">
                  Agregar favorito★
                </button>
              </form>
              <form  action="{{route('eliminarFavorito')}}" method="POST">
                {{csrf_field()}}
                <label for="idLibro"></label>
                <input type="hidden" name="idLibro" id="idLibro" value="{{ $libro->id }}">
                <button style="color:grey" type="submit" class="valoracion">
                  Eliminar favorito★
                </button>
              </form>
              {{$libro->titulo}} </br>
              <img src="{{asset('storage').'/'.$libro->img_libro}}"alt="" width="100">
              Calificacion:</br>
              <div class="valoracion">
                {{$cant=4}}
                @for($i=0; $i < $cant ; $i++)
                  <span class="activo">
                    ★
                  </span>
                @endfor
                @for ($i=$cant; $i < 5 ; $i++)
                  <span style="color:grey" class=" valoracion">
                    ★
                  </span>
                @endfor
                <span style="font-size:16px">
                  ({{$cant}}/5 )
                </span>
              </div>
              Editorial: {{$libro->editorialL->nombre}}</br>
              Autor:     {{$libro->autorL->nombre}}</br>
              Genero:    {{$libro->generoL->nombre}} </br>
              </br>
              </br>
              @if(count($capitulos) == 1)
                Libro completo
                </br>
                pdf:
                <a href="{{asset('storage').'/'.$capitulos->first()->capitulo}}">
                  ver
                </a>
                </br>
              @else
                Capitulos </br>
                @foreach($capitulos as $capitulo)
                  <div>
                    <div>
                      nro:{{$capitulo->nro}}</br>
                      titulo:{{$capitulo->titulo}}</br>
                      capitulo:<a href="{{asset('storage').'/'.$capitulo->capitulo}}"> ver </a></br>
                    </div>
                  </div>
                @endforeach
              @endif
              </br>
              Comentarios</br></br>
              @foreach($comentarios as $comentario)
              <div>
                <div>
                  idperfil   {{$comentario->idperfil}}</br>
                  </br>
                  nombre de perfil     {{$comentario->perfil->nombre}}</br>
                  </br>
                  nombre de libro     {{$comentario->libro->titulo}}</br>
                  comentario {{$comentario->created_at}} </br>
                  {{$comentario->desc}}</br>
                </div>
              </div>------------------------------------------------------
              @endforeach
              <form action="{{route('agregarComentario')}}" method="POST">
                {{csrf_field()}}
                <textarea name="desc" rows="5" cols="50">
                  Escribir un comentario
                </textarea></br>
                <label for="idLibro"></label>
                <input type="hidden" name="idLibro" id="idLibro" value="{{ $libro->id }}">
                <button  type="submit">
                  Enviar
                </button>
              </form>
          </div>
        </div>
    </div>
</div>
@endsection