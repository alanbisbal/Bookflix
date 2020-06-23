<?php

namespace App\Http\Controllers;

use App\Novedad;
use App\Editorial;
use App\Autor;
use App\Perfil;
use App\Lectura;
use App\Libro;
use Illuminate\Http\Request;

class BuscadorController extends Controller
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
       return view('buscador');
       }



    public function busqueda(Request $request)
    {
     $palabra=$request->busqueda;
     $busquedas=Libro::where('titulo','like',"%$palabra%")
     ->orWhereExists(function ($query) use ($palabra) {
                    $query->select(Editorial::raw(1))
                          ->from('editorials')
                          ->whereRaw('editorials.id = libros.idEditorial')
                          ->where('nombre','like',"%$palabra%");
                })
                ->orWhereExists(function ($query) use ($palabra) {
                $query->select(Autor::raw(1))
                     ->from('autors')
                     ->whereRaw('autors.id = libros.idautor')
                     ->where('nombre','like',"%$palabra%");
           })->where('visible','=',1)->get();
     return view('buscador',compact('busquedas','palabra'));
     }









}
