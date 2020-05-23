@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="height: 60%">

              AgregarEditorial
              <form action="{{'editorialesCargados'}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}

                @error('nombre')
                @enderror
                <label for="nombre">{{'Nombre: '}}</label>
                <input type="text" name="nombre" id="nombre" value="">
              </br>

              @if($errors->has('nombre'))
                Nombre no puede estar vacio
              @endif
                <input type="submit" class="btn btn-primary" value="Agregar">
              </form>



            </div>
        </div>
    </div>
</div>
@endsection
