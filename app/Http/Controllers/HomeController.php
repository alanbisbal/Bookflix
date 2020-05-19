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
    public function index($id)
    {
      $perfiles=Perfil::where("email","=",auth()->user()->email)->get()->sortBy('nombre');
      if($perfiles->contains($id)){
        $libros=Libro::all();
        $novedades= Novedad::all();
        $perfilActivo=Perfil::where("id","=",$id)->get()->first();
        if (auth()->user()->es_premium) {
          $cant=4;
        }
        else{
          $cant=2;
        }
        $cant = $cant - sizeof($perfiles);
        return view('home',compact('novedades','perfiles','cant','perfilActivo','libros'));
    }else {
      return redirect()->action('PerfilController@seleccionPerfil');;
    }
  }

    public function administracion()
    {
        return view('administracion');
    }
    public function nuevoPerfil()
    {
        return view('nuevoPerfil');
    }
}
