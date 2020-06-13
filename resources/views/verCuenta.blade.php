@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header" style="display:flex; justify-content: space-between;"> <h3 style="display:flex">Bienvenido {{auth()->user()->name}}</h3>
                @if (auth()->user()->es_admin)
                  <a class="nav-link" style="display:flex; align-content: center;"href="{{route('administracion')}}">Tareas administrativas</a>
                    @endif
                 </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                         </div>
                    @endforeach
                    <form action="{{ route('cuenta.update') }}" method="POST">
                      @method('PUT')
                      @csrf
                    <input type="text" name="name" placeholder="Nombre" class="form-control mb-2" value="{{auth()->user()->name}}"></br>
                    <input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2" value="{{auth()->user()->apellido}}"></br>
                    <div class="col-md-6">
                        <button class="btn btn-warning btn-block" type="submit">
                            Editar
                        </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
@endsection