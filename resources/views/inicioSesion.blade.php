@extends('plantilla')

@section('seccion')

	Iniciar sesion <br>

	@foreach($user as $usuario)
		<a href="">{{$usuario}}</a><br>
	@endforeach





@endsection
