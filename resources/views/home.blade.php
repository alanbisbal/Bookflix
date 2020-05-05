@extends('layouts.app')

@section('content')
<div class="container">
    <div class="left">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bookflix</div>

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
            @if(auth()->user()->admin == True )
              <a class="nav-link" href="{{route('administracion')}}">Tareas administrativas</a>




            @endif

          <?php  $consulta= DB::table('users')->get()?>

          <container class="container-sm">
            <container>
               <a class="" href="/perfil"><img  src="imagenes/bookflix.jpeg" width= 100px; ></a>
            </container>
            <container>

             <a class="" href="/perfil"><img  src="imagenes/bookflix.jpeg" width= 100px; ></a>
            </container>
            <container>

               <a class="" href="/perfil"><img  src="imagenes/bookflix.jpeg" width= 100px; ></a>
            </container>
            <container>

             <a class="" href="/perfil"><img  src="imagenes/bookflix.jpeg" width= 100px; ></a>
            </container>

          </container>
        </br>
          @foreach($consulta as $user)
                 usuario: {{$user->name}}<br>
          @endforeach
        </div>
    </div>
</div>
@endsection
