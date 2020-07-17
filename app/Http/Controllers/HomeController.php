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

        $masvotados=Libro::withCount('calificaciones')
                         ->get()->sortBy('calificaciones_count')->reverse();


        $masleidos=Libro::withCount('lecturas')
                          ->get()->where('visible','=',1)->sortBy('lecturas_count')->reverse();



    $mejoresCalificados=Libro::where('visible', '=', 1)
	                     ->leftJoin('calificaciones', 'calificaciones.idLibro', '=', 'libros.id')
	                     ->select(array('libros.*',
		                     DB::raw('AVG(calif) as ratings_average')
		                     ))
	                     ->groupBy('id')
	                     ->orderBy('ratings_average', 'DESC')
	                     ->get();




        $nuevos=$libros->sortByDesc('id')->where('visible','=','1');
        $masvotados=$masvotados->take(10);
        $masleidos=$masleidos->take(10);
        $nuevos=$nuevos->take(10);
        $mejoresCalificados=$mejoresCalificados->take(10);

        $novedades= Novedad::all();
        if (auth()->user()->es_premium) {
          $cant=4;
        }
        else{
          $cant=2;
        }
        $cant = $cant - sizeof($perfiles);
        if($perfiles)
        return view('home',compact('novedades','cant','libros','masvotados','masleidos','nuevos','mejoresCalificados'));
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

       public function catalogoFiltrado(Request $request)
       {
         if(empty(session('perfil'))){
           return redirect()->action('PerfilController@seleccionPerfil');
         }

          $generos=Genero::all()->where('visible','=',1);

          $autores=Autor::all()->where('visible','=',1);

          $editoriales=Editorial::all()->where('visible','=',1);
          $libros =Libro::all()->where('visible','=',1);

          if(isset($request->autor)){
            $librosAutor= Libro::where('idautor',"=",$request->autor)->get();
            $libros=$libros->intersect($librosAutor);
          }

          if(isset($request->genero)){
            $librosGenero= Libro::where('idGenero',"=",$request->genero)->get();
            $libros=$libros->intersect($librosGenero);
          }
          if(isset($request->editorial)){
            $librosEditorial= Libro::where('idEditorial',"=",$request->editorial)->get();
              $libros=$libros->intersect($librosEditorial);
          }

          $libros=collect($libros)->sortBy('titulo');
          if(isset($request->orden)){
            if($request->orden == "DESC"){
              $libros=$libros->sortByDesc('titulo');
            }
          }

          return view('verCatalogo',compact('libros','generos','autores','editoriales'));
       }


}
