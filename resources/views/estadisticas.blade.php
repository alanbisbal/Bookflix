@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/estilos-estadisticas.css">

<script>
  function mostrar2(contenedor, boton) {
    div = document.getElementById(contenedor);
    div.style.display = '';
    a = document.getElementById(boton);
    a.style.display = 'none';
  }
  function cerrar2(contenedor, boton) {
    div = document.getElementById(contenedor);
    div.style.display = 'none';
    a = document.getElementById(boton);
    a.style.display = '';
  }
</script>
<script>
  function mostrar3(contenedor, boton) {
    div = document.getElementById(contenedor);
    div.style.display = '';
    a = document.getElementById(boton);
    a.style.display = 'none';
  }
  function cerrar3(contenedor, boton) {
    div = document.getElementById(contenedor);
    div.style.display = 'none';
    a = document.getElementById(boton);
    a.style.display = '';
  }
</script>
<script>
  function mostrar4(contenedor, boton) {
    div = document.getElementById(contenedor);
    div.style.display = '';
    a = document.getElementById(boton);
    a.style.display = 'none';
  }
  function cerrar4(contenedor, boton) {
    div = document.getElementById(contenedor);
    div.style.display = 'none';
    a = document.getElementById(boton);
    a.style.display = '';
  }
</script>
<script>
  function mostrar5(contenedor, boton) {
    div = document.getElementById(contenedor);
    div.style.display = '';
    a = document.getElementById(boton);
    a.style.display = 'none';
  }
  function cerrar5(contenedor, boton) {
    div = document.getElementById(contenedor);
    div.style.display = 'none';
    a = document.getElementById(boton);
    a.style.display = '';
  }
</script>
<script>
  function mostrar6(contenedor, boton) {
    div = document.getElementById(contenedor);
    div.style.display = '';
    a = document.getElementById(boton);
    a.style.display = 'none';
  }
  function cerrar6(contenedor, boton) {
    div = document.getElementById(contenedor);
    div.style.display = 'none';
    a = document.getElementById(boton);
    a.style.display = '';
  }
</script>
<script>
  function mostrar7(contenedor, boton) {
    div = document.getElementById(contenedor);
    div.style.display = '';
    a = document.getElementById(boton);
    a.style.display = 'none';
  }
  function cerrar7(contenedor, boton) {
    div = document.getElementById(contenedor);
    div.style.display = 'none';
    a = document.getElementById(boton);
    a.style.display = '';
  }
</script>

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>
          Estadísticas:
        </h3>
      </div>
      <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <div>
          <b>Cantidad de usuarios totales: {{$uTot}}</b>
        </div>
        <hr>
        <div class="vermas2">
          <p>
            <b>Cantidad de usuarios registrados por edad:</b>
          </br>
            <a id="boton2" href="javascript:mostrar2('contenedor2', 'boton2')">
              Ver ↓
            </a>
          </p>
          <div id="contenedor2" style="display:none;">
            <div class="alert alert-success" role="alert">
              Entre 18 y 30 años: {{$u18y30}}
            </div>
            <div class="alert alert-success" role="alert">
              Entre 31 y 50 años: {{$u31y50}}
            </div>
            <div class="alert alert-success" role="alert">
              Con más de 51 años: {{$u51mas}}
            </div>
            <a  href="javascript:cerrar2('contenedor2', 'boton2')">
              Cerrar ↑
            </a>
          </div>
        </div>
        <hr>
        <div class="vermas3">
          <p>
            <b>Los usuarios que más leyeron:</b>
            </br>
            <a id="boton3" href="javascript:mostrar3('contenedor3', 'boton3')">
              Ver usuarios ↓
            </a>
          </p>
          <div id="contenedor3" style="display:none;">
            <div class="alert alert-success">
              @if(count($uMasLecturas)==0)
                No hay lecturas realizadas todavia
              @else
              @foreach($uMasLecturas as $u)
                {{$u->email}}
                </br>
              @endforeach
              @endif
            </div>
            <a  href="javascript:cerrar3('contenedor3', 'boton3')">
              Cerrar ↑
            </a>
          </div>
        </div>
        <hr>
        <div class="vermas4">
          <p>
            <b> Los usuarios que más comentaron:</b>
            </br>
            <a id="boton4" href="javascript:mostrar2('contenedor4', 'boton4')">
              Ver usuarios ↓
            </a>
          </p>
          <div id="contenedor4" style="display:none;">
            <div class="alert alert-success" role="alert">
              @foreach($uMasComentarios as $u)
                {{$u->email}}
                </br>
              @endforeach
            </div>
            <a  href="javascript:cerrar4('contenedor4', 'boton4')">
              Cerrar ↑
            </a>
          </div>
        </div>
        <hr>
        <div class="vermas5">
          <p>
            <b>Cantidad de usuarios registrados con premium: {{count($uPremium)/$uTot*100 }}%</b>
            </br>
            <a id="boton5" href="javascript:mostrar5('contenedor5', 'boton5')">
              Ver usuarios ↓
            </a>
          </p>
          <div id="contenedor5" style="display:none;">
            <div class="alert alert-success">
              @if(count($uPremium)==0)
              No hay usuarios usuarios Premium
              @else
              @foreach($uPremium as $u)
                {{$u->email}}
                </br>
              @endforeach
              @endif
            </div>
            <a  href="javascript:cerrar5('contenedor5', 'boton5')">
              Cerrar ↑
            </a>
          </div>
        </div>
        <hr>
        <div class="vermas6">
          <p>
            <b>Cantidad de usuarios registrados sin premium: {{count($uNoPremium)/$uTot*100 }}%</b>
            </br>
            <a id="boton6" href="javascript:mostrar6('contenedor6', 'boton6')">
              Ver usuarios ↓
            </a>
          </p>
          <div id="contenedor6" style="display:none;">
            <div class="alert alert-success">
              @if(count($uNoPremium)==0)
              No hay usuarios comunes
              @else
              @foreach($uNoPremium as $u)
              {{$u->email}}
              </br>
            @endforeach
            @endif
            </div>
            <a  href="javascript:cerrar6('contenedor6', 'boton6')">
              Cerrar ↑
            </a>
          </div>
        </div>
        <hr>
        <div class="vermas7">
          <p>
            <b>Los libros más leidos:</b>
            </br>
            <a id="boton7" href="javascript:mostrar7('contenedor7', 'boton7')">
              Ver libros ↓
            </a>
          </p>
          <div id="contenedor7" style="display:none;">
            <div class="alert alert-success">
              @foreach($masLeidos as $libro)
              <b>{{count($libro->lecturas)}}</b> lecturas - <b><i>{{($libro->titulo)}}</i></b> de <i><b>{{$libro->autorL->nombre}}</i></b>.
              </br>
              </br>
            @endforeach
            </div>
            <a  href="javascript:cerrar7('contenedor7', 'boton7')">
              Cerrar ↑
            </a>
          </div>
        </div>
        <!--
          ES LO QUE ESTABA ANTES DE METER MANO:
        <div>
          <a href="{{'librosMasLeidos'}}">
            <b>Ver libros más leidos</b>
          </a>
        </div>
        -->
        <hr>
        @foreach($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            {{$error}}
          </div>
        @endforeach
        <div>
          <b>Cantidad de usuarios registrados entre dos fechas</b>
          </br>
          </br>
          <form  action="{{'usuariosEntreFechas'}}" method="get">
            <div class="form-group row">
                <label for="fechaInicio" class="col-md-4 col-form-label text-md-right">
                  Fecha de inicio
                </label>
                <div class="col-md-7">
                  <input id="fechaInicio" class="form-control align-center" type="date"  name="fechaInicio" value="<?php echo date('Y-m-d'); ?>"
                    min="1900-01-01"
                    max="2500-12-41">
                </div>
            </div>
            <div class="form-group row">
                <label for="fechaFin" class="col-md-4 col-form-label text-md-right">
                    Fecha de fin
                </label>
                <div class="col-md-7">
                  <input id="fechaFin" class="form-control align-center" type="date"  name="fechaFin" value="<?php echo date('Y-m-d'); ?>"
                    min="1900-01-01"
                    max="2500-12-41">
                </div>
            </div>
            </br>
            <button type="submit" class="btn btn-primary btn-general">
                {{ 'Consultar' }}
            </button>
          </form>
        </div>
        <hr>
        <a href="{{'administracion'}}" class="btn btn-info" role="button">
          Volver
        </a>
      </div>
    </div>
  </div>

@endsection
