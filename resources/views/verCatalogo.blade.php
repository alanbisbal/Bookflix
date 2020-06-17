@extends('layouts.app')
<style>
.card{
  height: 70%;
  display: flex;
  align-content:  center;
}
.card-header{
  display:flex;
  align-items:center;
  justify-content: center;
}
.card-body{
}
.libros{
  text-decoration: none;
  color: red;
}
.libros:hover{
  text-decoration: none;
  color: red;
  font-weight: bold;
}
</style>
@section('content')

<div class="menu">
    <div class="background-overlay">
         <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-8" style="height: 650px">
                    <div class="card" style="border: 1px solid black;">
                        <div class="card-header" style="height: 15%; background-color: black; border: 2px solid black; border-radius: 0px; width: 100%; color: white; ">
                            <h3 class="text-center align-middle" >Bienvenido {{session('perfil')->nombre}}</h3>
                                @if (auth()->user()->es_admin)
                                    <p>
                                        (Administrador)
                                    </p>
                                    <a class="nav-link" href="{{route('administracion')}}">
                                        Tareas administrativas
                                    </a>
                                @endif
                        </div>
                        <div class="tarjetasanidadas " style="overflow-y: scroll;">
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="card-body" >
                                    <div class="card-header" >
                                        @foreach($libros as $libro)
                                            @if($libro->visible)
                                                <div>
                                                    <a class="libros" href="{{route('libro.trailer',$libro->id)}}">
                                                    <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100" width="100">
                                                        </br>
                                                        Trailer
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection