@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-verCatalogo.css">
<div class="card cb2">
    <div class="card-header">
        Filtros
    </div>

	<form  action="{{'catalogoFiltrado'}}" method="post" >
    @csrf
    <div class="tarjetasanidadas">

      Genero:<select name="genero" value="">
     	<option disabled selected value> -- Seleccione una opcion -- </option>
      @foreach($generos as $genero)
          <div class="text-dark tarjetaanidada-una">
              <div class="card-body">
                <ul>
                <option value="{{$genero->id}}">{{$genero->nombre}}</option>
                </ul>
              </div>
          </div>
      @endforeach
      </select>

    </br>
    Autor:<select name="autor" >
    <option disabled selected value> -- Seleccione una opcion -- </option>
      @foreach($autores as $autor)
          <div class="text-dark tarjetaanidada-una">
              <div class="card-body">
                <ul>
                <option value="{{$autor->id}}">{{$autor->nombre}}</option>
              </ul>
              </div>
          </div>
      @endforeach
    </br>
    </select>
  </br>
  Editorial:<select name="editorial">
    <option disabled selected value> -- Seleccione una opcion -- </option>
    @foreach($editoriales as $editorial)
        <div class="text-dark tarjetaanidada-una">
            <div class="card-body">
            <ul>
              <option value="{{$editorial->id}}">{{$editorial->nombre}}</option>
            </ul>
            </div>
        </div>
    @endforeach
  </br>
</select>
</br>
Orden:<select name="orden">
  <option disabled selected value> -- Seleccione una opcion -- </option>

      <div class="text-dark tarjetaanidada-una">
          <div class="card-body">
          <ul>
            <option value="ASC">{{'A..Z'}}</option>
            <option value="DESC">{{'Z..A'}}</option>
          </ul>
          </div>
      </div>

</br>
</select>


  </div>
  <input type="submit" value="Enviar">
  </form>
</div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>
                    Catálogo de libros
                </h3>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="libros">
                  @if(count($libros)==0)
                    No hay resultados para la busqueda
                  @else
                    @foreach($libros as $libro)
                            <div class="libro">
                                <a href="{{route('libro.trailer',$libro->id)}}">
                                    <div class="imagen">
                                        <img src="{{asset('storage').'/'.$libro->img_libro}}" alt="100" width="100">
                                    </div>
                                    <i>
                                        {{($libro->titulo)}}
                                    </i>
                                </a>
                            </div>

                    @endforeach
                    @endif
                </div>
                <div class="boton">
                    <a href="{{url('/home')}}" class="btn btn-info" role="button">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
