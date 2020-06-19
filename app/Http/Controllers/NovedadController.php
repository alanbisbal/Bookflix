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
      $request->validate([
    'titulo' => 'required',
  'desc' => 'required',],
  [
    'titulo.required' => 'El título es requerido',
  'desc.required' => 'La descripción es requerida',
  ]);
      $datoNovedad=request()->except('_token');
      Novedad::insert($datoNovedad);
      return $this->index();
    }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Novedad  $novedad
         * @return \Illuminate\Http\Response
         */
         public function update(Request $request, $id){

             $request->validate([
           'titulo' => 'required',
           'desc' => 'required',],
           [
             'titulo.required' => 'El título es requerido',
           'desc.required' => 'La descripción es requerida',
           ]);
         $novedadActualizado = Novedad::find($id);
         $novedadActualizado->titulo = $request->titulo;
         $novedadActualizado->desc = $request->desc;
         $novedadActualizado->save();
         return redirect()->action('NovedadController@index');
         }

         /**
          * Remove the specified resource from storage.
          *
          * @param  \App\Novedad  $novedad
          * @return \Illuminate\Http\Response
          */
         public function eliminar($id)
         {

            $novedadEliminar = Novedad::findOrFail($id);
            $novedadEliminar->delete();
            return redirect()->action('NovedadController@index');
         }


         public function editar($id){
         $novedad = Novedad::findOrFail($id);
         $novedad->save();
         return view('editarNovedad',compact('novedad'));
     }
}