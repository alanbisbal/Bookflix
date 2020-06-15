<?php

namespace App\Http\Controllers;

use App\Lectura;
use App\Libro;
use Illuminate\Http\Request;


class LecturaController extends Controller
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
    public function store(Request $request,$idPerfil,$idLibro)
    {

      $dato->idPerfil=$idPerfil;
      $dato->leido=0;
      $dato->desde=null;
      $dato->idLibro=$idLibro;
      Lectura::insert($dato);
      return $dato;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lectura  $lectura
     * @return \Illuminate\Http\Response
     */
    public function show(Lectura $lectura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lectura  $lectura
     * @return \Illuminate\Http\Response
     */
    public function edit(Lectura $lectura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lectura  $lectura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lectura $lectura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lectura  $lectura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lectura $lectura)
    {
        //
    }

    public function verLeidos()
      {
        if(empty(session('perfil'))){
          return  redirect()->action('PerfilController@seleccionPerfil');
        }
        $leidos=Lectura::where('idperfil',"=",session('perfil')->id)->get();
        return view('verLeidos',compact('leidos'));
      }
}