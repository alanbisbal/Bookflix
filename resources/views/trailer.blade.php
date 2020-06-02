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


           {{$libro->titulo}} </br>
          <img src="{{asset('storage').'/'.$libro->img_libro}}"alt="" width="100">
          Calificacion:</br>
          Editorial: {{$libro->editorialL->nombre}}</br>
          Autor:     {{$libro->autorL->nombre}}</br>
          Genero:    {{$libro->generoL->nombre}} </br>
          <a href="{{asset('storage').'/'.$libro->pdf}}" >Leer </a>
          </br>
          Comentarios</br></br>
          Usuario1  12:18: Comentario  1</br></br>
          Usuario2  15:26: Comentario  2</br></br>
          Usuario3  17:44: Comentario  3</br></br>
          <form >
            {{csrf_field()}}
            <textarea name="textarea" rows="5" cols="50">Escribir un comentario</textarea></br>
            <button  type="submit">Enviar</button>
          </form>
            </div>
      </div>
    </div>
</div>
@endsection