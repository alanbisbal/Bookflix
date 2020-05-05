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





                 @endif


                 <br>
                 Agregar Editorial:
                   <form action="test">
                     Nombre de la Editorial: <input type="text" name="nombre" required>
                     <input type="submit">
                   </form>





          @endif


        </div>
    </div>
</div>
@endsection
