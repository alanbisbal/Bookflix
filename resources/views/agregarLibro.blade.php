@extends('layouts.app')

@section('content')
<div class="container">

    <div class="left">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bookflix</div> 
              @if(auth()->user()->admin == True )
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 Bienvenido {{auth()->user()->name}}
                 @if(auth()->user()->admin == True )
                   (Administrador)
                 </br></br>

                 <p>AGREGAR LIBRO: </p>

                   <form method="POST" action= "Route::post('agregarLibro', 'Admin@update')">
                     <label for="isbn">ISBN:</label>
                     <input class="form-control" id="isbn" type="text" name="isbn"/>

                     <label for="description">Descripcion:</label>
                     <input class="form-control" id="description" type="text" name="description"/>

                     <label for="titulo">Titulo:</label>
                     <input class="form-control" id="titulo" type="text" name="titulo"/>

                     <label for="portada">Portada:</label>
                     <input class="form-control" id="portada" type="text" name="portada"/>

                     <label for="tit_trailer">Titulo de trailer:</label>
                     <input class="form-control" id="tit_trailer" type="text" name="tit_trailer"/>

                     <label for="img_trailer">Imagen de trailer:</label>
                     <input class="form-control" id="img_trailer" type="text" name="img_trailer"/>

                     <label for="des_trailer">Desripcion del trailer:</label>
                     <input class="form-control" id="des_trailer" type="text" name="des_trailer"/>
                     </br>
                     <label for="nomb_ed(fk)">editorial:</label>
                          <select id="editorial" name="editorial" form="carform">
                            <option value="editorial 1">predeterminada</option>
                            <option value="editorial 2">editorial 2</option>
                            <option value="editorial 3">editorial 3</option>
                            <option value="editorial 4">editorial 4</option>
                          </select>
                        </br>
                     <label for="nombreAutor">Autor:</label>
                     <select id="nombreAutor" name="nombreAutor" form="carform">
                       <option value="nombreAutor 1">predeterminada</option>
                       <option value="nombreAutor 2">editorial 2</option>
                       <option value="nombreAutor 3">editorial 3</option>
                       <option value="nombreAutor 4">editorial 4</option>
                     </select>
                     </br>


                     <button type="submit">Enviar</button>

                   </form>











                 @endif







          @endif


        </div>
    </div>
</div>
@endsection
