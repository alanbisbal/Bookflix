<?php

namespace App\Http\Controllers;

use App\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
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
      $datos['editoriales']=Editorial::paginate()->sortBy('Nombre');
          return view('editorialesCargados',$datos);
    }

    public function agregarEditorial()
    {
          return view('agregarEditorial');
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
      $datoEditorial=request()->except('_token');
      Editorial::insert($datoEditorial);
      return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function show(Editorial $editorial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Editorial  $editorial
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id){

     $editorialActualizado = Editorial::find($id);



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
