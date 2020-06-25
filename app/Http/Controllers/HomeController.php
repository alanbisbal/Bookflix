<?php

namespace App\Http\Controllers;

use App\Novedad;
use App\Perfil;
use App\Lectura;
use App\Libro;
use App\Genero;
use App\Autor;
use App\Editorial;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

        $masvotados=DB::table('libros')
                    ->join('calificaciones', 'libros.id', '=', 'calificaciones.idLibro')
                    ->select('libros.*')
                    ->where('visible','=','1')
                    ->orderByDesc('calif')
                    ->distinct()
                    ->get();


       $masleidos=DB::table('libros')
                      ->select('libros.*')
                      ->join('lecturas', 'libros.id', '=', 'lecturas.idLibro')          
                      ->where('visible','=','1')
                      ->distinct();

        $nuevos=$libros->sortByDesc('id')->where('visible','=','1');


        $novedades= Novedad::all();
        if (auth()->user()->es_premium) {
          $cant=4;
        }
        else{
          $cant=2;
        }
        $cant = $cant - sizeof($perfiles);
        if($perfiles)
        return view('home',compact('novedades','cant','libros','masvotados','masleidos','nuevos'));
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
          $generos=Genero::all()->where('visible','=',1);
          $autores=Autor::all()->where('visible','=',1);
          $editoriales=Editorial::all()->where('visible','=',1);
          $libros=Libro::all()->where('visible','=',1);
          return view('verCatalogo',compact('libros','generos','autores','editoriales'));
       }


}
