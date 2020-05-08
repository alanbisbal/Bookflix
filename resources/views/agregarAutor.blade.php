@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              
              Agregar Autor
              <form action="{{'agregarAutor'}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <label for="nombre">{{'Nombre: '}}</label>
                <input type="text" name="nombre" id="nombre" value="">
              </br>
                <input type="submit" value="Agregar">
              </form>


              Autores actuales:
            </br>
            <table class="table table-light">
              <thread class="thread-light">
                <th>ID</th>
                <th>Nombre</th>
              </thread>
              <tbody>
                  @foreach($autores as $autor)
                    <tr>
                      <td> {{$loop->iteration}}</td>
                      <td> {{$autor->nombre}}</td>
                    </tr>
                  @endforeach
                </tbody>

              </div>
        </div>
    </div>
</div>
@endsection
