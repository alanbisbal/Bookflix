@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <form action="{{'cargarPerfil'}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <label for="nombre">{{'Nombre de perfil: '}}</label>
                </br>

                <input type="text" name="nombre" id="nombre" value="">
                </br>

                <label for="imagen">{{'Imagen de trailer: '}}</label>
                </br>

                <input accept="image/*" type="file" name="imagen" >

                </br>
                <input type="submit" value="Agregar">
              </form>


            </div>
        </div>
    </div>
</div>
@endsection
