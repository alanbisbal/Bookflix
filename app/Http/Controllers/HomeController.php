<?php

namespace App\Http\Controllers;

use App\Novedad;
use App\Perfil;
use App\Lectura;
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
        $libros=Libro::all()->where('visible','=',1)->sortBy('nombre');
        $masvotados=$libros;
        $masleidos=Libro::all()->sortDesc()->
          each(function ($item) {
           $item->lecturas->count();
        });//CONTINUAR CON LA CONSULTA
        $nuevos=$libros->sortByDesc('id');
        $novedades= Novedad::all();
        if (auth()->user()->es_premium) {
          $cant=4;
        }
        else{
          $cant=2;
        }
        $cant = $cant - sizeof($perfiles);
        if($perfiles)
        return view('home',compact('novedades','cant','libros','nuevos','masleidos'));
      }
      else{
          return redirect()->action('PerfilController@seleccionPerfil');
          }
   }



       public function nuevoPerfil()
       {
           return view('nuevoPerfil');
       }

       public function verCatalogo()
       {
         if(empty(session('perfil'))){
           return redirect()->action('PerfilController@seleccionPerfil');
         }
           $libros=Libro::all()->where('visible','=',1);
           return view('verCatalogo',compact('libros'));
       }


}