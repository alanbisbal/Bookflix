@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <form action="{{'agregarLibro'}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <label for="isbn">{{'isbn: '}}</label>
                <input type="text" name="isbn" id="isbn" value="">
                </br>
                <label for="titulo">{{'titulo: '}}</label>
                <input type="text" name="titulo" id="titulo" value="">
                </br>
                <label for="desc">{{'desc: '}}</label>
                <input type="text" name="desc" id="desc" value="">
                </br>
                <label for="img_libro">{{'Portada del libro: '}}</label>
                <input accept="image/*" type="file" name="img_libro" >
                </br>
                <label for="titulo_trailer">{{'Titulo de trailer: '}}</label>
                <input type="text" name="titulo_trailer" id="titulo_trailer" value="">
                </br>
                <label for="desc_trailer">{{'Descripcion de trailer: '}}</label>
                <input type="text" name="desc_trailer" id="desc_trailer" value="">
                </br>

                <label for="img_trailer">{{'Imagen de trailer: '}}</label>
                <input accept="image/*" type="file" name="img_trailer" >
                </br>



                <label for="idautor">{{'Autor: '}}</label>
                <select name="idautor">
                  @foreach($autores as $autor)
                     <option value="{{$autor->id}}">{{$autor->nombre}}</option>
                  @endforeach
                </select>
              </br>
                <label for="editorial">{{'editorial: '}}</label>
                <select name="editorial">
                  @foreach($editoriales as $editorial)
                    <option value="{{$editorial->nombre}}">{{$editorial->nombre}}</option>
                  @endforeach
                </select>
                </br>
                <label for="genero">{{'Genero: '}}</label>
                <select name="genero">
                  @foreach($generos as $genero)
                    <option value="{{$genero->nombre}}">{{$genero->nombre}}</option>
                  @endforeach
                </select>
                </br>
                <input type="submit" value="Agregar">
              </form>


            </div>
        </div>
    </div>
</div>
@endsection
