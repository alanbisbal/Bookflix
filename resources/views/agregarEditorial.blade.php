@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

              <form action="{{'agregarEditorial'}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <label for="nombre">{{'Nombre: '}}</label>
                <input type="text" name="nombre" id="nombre" value="">
              </br>
                <input type="submit" value="Agregar">
              </form>


              Editoriales Actuales:
            </br>
            <table class="table table-light">
              <thread class="thread-light">
                <th>ID</th>
                <th>Nombre</th>
              </thread>
              <tbody>
                  @foreach($editoriales as $editorial)
                    <tr>
                      <td> {{$loop->iteration}}</td>
                      <td> {{$editorial->nombre}}</td>
                    </tr>
                  @endforeach
                </tbody>
            </div>
        </div>
    </div>
</div>
@endsection
