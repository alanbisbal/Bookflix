@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <form action="{{'agregarNovedad'}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <label for="titulo">{{'Titulo:    '}}</label>

                <input type="text" name="titulo" id="titulo" value="">

              </br>
                <label for="desc">{{'descripcion: '}}</label>

                <input type="textarea" name="desc" id="desc" value="">
              </br>
                <input type="submit" value="Agregar">
              </form>


              Novedades actuales:
            </br>
            <table class="table table-light">
              <thread class="thread-light">
                <th>ID</th>
                <th>Titulo</th>
                <th>Descripcion</th>
              </thread>
              <tbody>
                  @foreach($novedades as $novedad)
                    <tr>
                      <td> {{$loop->iteration}}</td>
                      <td> {{$novedad->titulo}}</td>
                      <td> {{$novedad->desc}}</td>
                    </tr>
                  @endforeach
                </tbody>

            </div>
        </div>
    </div>
</div>
@endsection
