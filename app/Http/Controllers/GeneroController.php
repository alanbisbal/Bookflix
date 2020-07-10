<?php

namespace App\Http\Controllers;

use App\Genero;
use App\Libro;
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
      $datos['generos']=Genero::paginate()->sortBy('nombre')->where('visible','=',1);
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
      $request->validate([
      'nombre' => 'required | unique:generos',],
    [
      'nombre.required'=>'Debe ingresar un nombre',
      'nombre.unique'=>'Ese nombre ya existe en el sistema',
    ]);


      $datoGenero=request()->except('_token');
      $datoGenero['visible']=1;
      Genero::insert($datoGenero);
      return redirect()->action('GeneroController@index');
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

      $request->validate([
      'nombre' => 'required|unique:generos',],
    [
      'nombre.required'=>'Debe ingresar un nombre',
      'nombre.unique'=>'Ese nombre ya existe en el sistema',
    ]); 
    $generoActualizado->nombre = $request->nombre;
    $generoActualizado->save();

  return redirect()->action('GeneroController@index');
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
      $generoEliminar->hacerInvisible();

    return redirect()->action('GeneroController@index');
    }

  public function editar($id){
         $genero = Genero::findOrFail($id);
         $genero->save();
         return view('editarGenero',compact('genero'));
     }
    }