<?php

namespace App\Http\Controllers;

use App\Comentarios;
use App\Libro;
use Illuminate\Http\Request;

class ComentariosController extends Controller
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
     public function store(Request $request,$idLibro)
       {

         }

     public function agregarComentario(Request $request)
       {
           $comentario =new Comentarios;
           $comentario->idperfil = session('perfil')->id;
           $comentario->desc = $request->desc;
           $comentario->idLibro = $request->idLibro;
           $comentario->save();
           return back();
         }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function show(Comentarios $comentarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentarios $comentarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentarios $comentarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentarios $comentarios)
    {
        //
    }

    public function eliminar(Request $request)
    {
      $comentarioEliminar = Comentarios::findOrFail($request->idComentario);
      $comentarioEliminar->delete();
       return back();
    }

}