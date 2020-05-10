@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

              AgregarEditorial
              <form action="{{'agregarEditorial'}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <label for="nombre">{{'Nombre: '}}</label>
                <input type="text" name="nombre" id="nombre" value="">
              </br>
                <input type="submit" value="Agregar">
              </form>



            </div>
        </div>
    </div>
</div>
@endsection
