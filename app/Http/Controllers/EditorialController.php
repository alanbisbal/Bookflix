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

        $request->validate([
      'nombre' => 'required',]);
      $datoEditorial=request()->except('_token');
      Editorial::insert($datoEditorial);
      return redirect()->action('EditorialController@index');
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

         $request->validate([
       'nombre' => 'required',]);
     $editorialActualizada = Editorial::find($id);
     $editorialActualizada->nombre = $request->nombre;
     $editorialActualizada->save();
     return redirect()->action('EditorialController@index');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Editorial  $editorial
      * @return \Illuminate\Http\Response
      */
     public function eliminar($id)
     {

       $editorialEliminar = Editorial::findOrFail($id);
       $editorialEliminar->delete();
     return redirect()->action('EditorialController@index');
     }


     public function editar($id){
     $editorial = Editorial::findOrFail($id);
     $editorial->save();
     return view('editarEditorial',compact('editorial'));
 }
}
