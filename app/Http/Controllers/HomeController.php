<?php

namespace App\Http\Controllers;

use App\Novedad;
use App\Perfil;
use App\Libro;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      if(auth()->user()->es_admin){
          return view('administracion');
      }
      $perfiles=Perfil::where("email","=",auth()->user()->email)->get()->sortBy('nombre');
      if(!empty(session('perfil'))){
        $libros=Libro::all()->where('visible','=',1);;
        $novedades= Novedad::all();
        if (auth()->user()->es_premium) {
          $cant=4;
        }
        else{
          $cant=2;
        }
        $cant = $cant - sizeof($perfiles);
        if($perfiles)
        return view('home',compact('novedades','perfiles','cant','libros'));
    }
    else {
      return redirect()->action('PerfilController@seleccionPerfil');
    }
  }


    public function nuevoPerfil()
    {
        return view('nuevoPerfil');
    }
  
}