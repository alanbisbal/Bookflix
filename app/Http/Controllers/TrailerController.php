<?php

namespace App\Http\Controllers;
use App\Libro;
use App\Capitulo;
use App\Comentarios;
use App\Lectura;
use App\Calificaciones;
use App\Favorito;


class TrailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {

     }
    public function index()
    {

    }
    public function trailer($id)
    {
      $libro=Libro::find($id);
      if($libro->visible){
        $capitulos=Capitulo::where('idLibro',"=",$id)->get();
        $comentarios=Comentarios::where('idLibro',"=",$id)->get();
        $favs=Favorito::where('idLibro',"=",$id)->where('idperfil',"=",session('perfil')->id )->get();
        $califs=Calificaciones::where('idLibro',"=",$id)->where('idperfil',"=",session('perfil')->id )->get();
        $coment=Comentarios::where('idLibro',"=",$id)->where('idperfil',"=",session('perfil')->id )->get();
        $leido=Lectura::where('idLibro',"=",$id)->where('idperfil',"=",session('perfil')->id )->get();
      return view('trailer',compact('libro','capitulos','comentarios','favs','califs','coment','leido'));
      }
      return back();
    }

}