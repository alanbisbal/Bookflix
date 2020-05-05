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


                   <br>
                   Agregar Novedad:
                     <form action="test">
                       <label for="Titulo">Titulo:</label>
                       <input class="form-control" id="Titulo" type="text" name="Titulo" required/>
                       <label for="Descripcion">Descripcion:</label>
                       <textArea class="form-control" id="Descripcion" type="text-area " name="Descripcion" required></textarea>

                       <input type="submit">
                     </form>



                 @endif







          @endif


        </div>
    </div>
</div>
@endsection
