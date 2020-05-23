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
        <div class="col-md-8" >
            <div class="card" style="border: 1px solid black;">
                <div class="card-header" style="height: 15%; background-color: black; border: 2px solid black; border-radius: 0px; width: 100%; color: white; "> <h3 class="text-center align-middle" >Bienvenido {{$perfilActivo->nombre}}</h3>
                  @if (auth()->user()->es_admin)
                     <p>(Administrador)</p>
                    <a class="nav-link" href="{{route('administracion')}}">Tareas administrativas</a>
                  @endif
                 </div>
                 <div class="tarjetasanidadas " style="overflow-y: scroll;max-height: 650px;">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body" style="height: 100%" >
                    @foreach($libros as $libro)
                      <div class="card-header" >
                      <a class="libros" href="{{asset('storage').'/'.$libro->pdf}}">
                        {{$libro->titulo}}
                        <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100" width="100">
                      </a>
                      </br>
                          </div>
                    </br>

                      </br>
                    @endforeach
                    </div>


                </div>
            </div>


    </div>
    <div class="col-md-3">
      <div class="card" style="border: 1px solid black; overflow: hidden;" >

        <div class="card-header" style=" height: 20%;background-color: #383232; border: 2px solid black; border-radius: 0px; width: 100%; color: white;">
          Sección de novedades
        </div>
        <div class="tarjetasanidadas " style="overflow-y: scroll;max-height: 650px;">
          @foreach($novedades as $novedad)

          <div class="text-dark tarjetaanidada-una" style="border-style: solid;border-radius: 0px; border-top: 10px; border-left: 10px; border-right: 10px; border-bottom: 10px;">
            <div class="card-body " style="height: 110px;
            background-color: white;
            border-bottom: gray 2px solid;">

              <h5 class="card-title text-Left">{{$novedad->titulo}}</h5>
              <p class="card-text text-center">{{$novedad->desc}}</p>

          </div>
          </div>
          @endforeach
        </div>
          </div>
            </div>


</div>
</div>
</div>
</div>

@endsection
