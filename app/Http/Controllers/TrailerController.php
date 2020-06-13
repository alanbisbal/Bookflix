<?php

namespace App\Http\Controllers;
use App\Libro;
use App\Capitulo;
use App\Comentarios;
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
      $capitulos= Capitulo::where('idLibro',"=",$id)->get();
      $comentarios= Comentarios::where('idLibro',"=",$id)->get();
      $es_fav= Favorito::where('idLibro',"=",$id and 'idperfil',"=",session('perfil')->id );
      return view('trailer',compact('libro','capitulos','comentarios','es_fav'));
    }

}