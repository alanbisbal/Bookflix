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
                </div>
            </div>


              <a class="nav-link" href="{{route('agregarLibro')}}">Agregar Libro</a></br>
              <a class="nav-link" href="{{route('agregarNovedad')}}">Agregar Novedad</a></br>
              <a class="nav-link" href="{{route('agregarAutor')}}">Agregar Autor</a></br>
              <a class="nav-link" href="{{route('agregarEditorial')}}">Agregar Editorial</a></br>






          @endif


        </div>
    </div>
</div>
@endsection
