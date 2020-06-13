<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Libro;
use Illuminate\Http\Request;

class AutorController extends Controller
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
      $datos['autores']=Autor::paginate()->sortBy('nombre')->where('visible','=',1);
          return view('autoresCargados',$datos);
    }

    public function agregarAutor()
    {
          return view('agregarAutor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


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
    'nombre' => 'required',],
    [
      'nombre.required'=>'Debe ingresar un nombre',
    ]);

      $datoAutor=request()->except('_token');
      $datoAutor['visible']=1;
      Autor::insert($datoAutor);
      return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show(Autor $autor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function edit(Autor $autor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autor  $autor
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id){

       $request->validate([
       'nombre' => 'required',],
       [
       'nombre.required'=>'Debe ingresar un nombre',
       ]);


     $autorActualizado = Autor::find($id);
     $autorActualizado->nombre = $request->nombre;
     $autorActualizado->save();
     return redirect()->action('AutorController@index');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Autor  $autor
      * @return \Illuminate\Http\Response
      */
     public function eliminar($id)
     {
       $autorEliminar = Autor::findOrFail($id);
       $autorEliminar->hacerInvisible();

     return redirect()->action('AutorController@index');
     }

     public function editar($id){
     $autor = Autor::findOrFail($id);
     $autor->save();
     return view('editarAutor',compact('autor'));
 }
}