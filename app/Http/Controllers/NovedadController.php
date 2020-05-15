<?php

namespace App\Http\Controllers;

use App\Novedad;
use Illuminate\Http\Request;

class NovedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('admin');
     }
    public function index()
    {
      $datos['novedades']=Novedad::paginate()->sortBy('nombre');
          return view('novedadesCargados',$datos);
    }
    public function agregarNovedad()
    {
          return view('agregarNovedad');
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
      $datoAutor=request()->except('_token');
      Novedad::insert($datoAutor);
      return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Novedad  $novedad
     * @return \Illuminate\Http\Response
     */
    public function show(Novedad $novedad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Novedad  $novedad
     * @return \Illuminate\Http\Response
     */
    public function edit(Novedad $novedad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Novedad  $novedad
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id){

     $novedadActualizado = Novedad::find($id);



     $editorialActualizado->nombre = $request->nombre;
     $editorialActualizado->save();
     return $this->index();
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Genero  $genero
      * @return \Illuminate\Http\Response
      */
     public function eliminar($id)
     {
       $editorialEliminar = Editorial::findOrFail($id);
       $editorialEliminar->delete();
     return $this->index();
     }


     public function editar($id){
     $genero = Editorial::findOrFail($id);
     return view('editarEditorial', compact('genero'));
   }
}
