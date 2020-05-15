<?php

namespace App\Http\Controllers;

use App\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
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
      $datos['generos']=Genero::paginate()->sortBy('nombre');
          return view('generosCargados',$datos);
    }
    public function agregarGenero()
    {
          return view('agregarGenero');
    }

    public function generosCargados()
    {
          return $this->index();
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
      $datoGenero=request()->except('_token');
      Genero::insert($datoGenero);
      return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit(Genero $genero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){

    $generoActualizado = Genero::find($id);



    $generoActualizado->nombre = $request->nombre;
    $generoActualizado->save();
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
      $generoEliminar = Genero::findOrFail($id);
      $generoEliminar->delete();
    return $this->index();
    }


    public function editar($id){
    $genero = Genero::findOrFail($id);
    return view('editarGenero', compact('genero'));
}
}
