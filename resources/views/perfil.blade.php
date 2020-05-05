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
       <div class="card" style="width: 18rem;">
             <div class="card-body">

                   <container>
                     <a class="" href="/perfil"><img  src="imagenes/bookflix.jpeg" width=240; ></a>
                 <container>
                 </br>

                   <a href="#" class="btn btn-primary">Ir al libro</a>
             </div>
       </div>
       <div class="card" style="width: 18rem;">
             <div class="card-body">

                   <container>
                     <a class="" href="/perfil"><img  src="imagenes/bookflix.jpeg" width=240; ></a>
                 <container>
                 </br>

                   <a href="#" class="btn btn-primary">Ir al libro</a>
             </div>
       </div>

       <div class="card" style="width: 18rem;">
             <div class="card-body">

                   <container>
                     <a class="" href="/perfil"><img  src="imagenes/bookflix.jpeg" width=240; ></a>
                 <container>
                 </br>

                   <a href="#" class="btn btn-primary">Ir al libro</a>
             </div>
       </div>

       <div class="card" style="width: 18rem;">
             <div class="card-body">

                   <container>
                     <a class="" href="/perfil"><img  src="imagenes/bookflix.jpeg" width=240; ></a>
                 <container>
                 </br>

                   <a href="#" class="btn btn-primary">Ir al libro</a>
             </div>
       </div>



    

        </div>
    </div>
</div>
@endsection
