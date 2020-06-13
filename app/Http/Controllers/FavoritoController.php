<?php

namespace App\Http\Controllers;

use App\Favorito;
use App\Libro;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
       {
         }

    public function agregarFavorito(Request $request)
      {

        $fav= new Favorito;
        $fav->idperfil =session('perfil')->id;
        $fav->idLibro= $request->idLibro;
        $fav->save();
        return back();
        }

        public function eliminarFavorito(Request $request)
          {
          $fav=Favorito::where('idLibro','=',$request->idLibro)->first();
          $fav->delete();
          return redirect()->route('home');
          }



    /**
     * Display the specified resource.
     *
     * @param  \App\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function show(Favorito $favorito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorito $favorito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorito $favorito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorito $favorito)
    {
        //
    }
}