<?php

namespace App\Http\Controllers;

use App\Capitulo;

use App\Libro;
use Illuminate\Http\Request;

class CapituloController extends Controller
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


    public function agregarCapitulo(Request $request)
    {

      $request->validate([
      'titulo' => 'required',
      'capitulo'=>'required'

    ],
      [
        'titulo.required'=>'Debe ingresar un nombre para el capitulo',
        'capitulo.requiered'=> 'No se cargo archivo del capitulo'
      ]);


      $idLibro= $request['idLibro'];
      $nro= Capitulo::all()->where('idLibro','=',$idLibro);
      $datoCapitulo['nro']=sizeof($nro)+1;
      $datoCapitulo['idLibro']=$request['idLibro'];
      $datoCapitulo['titulo']= $request['titulo'];
      $datoCapitulo['capitulo']=$request->file('capitulo')->store('uploads','public');
      Capitulo::insert($datoCapitulo);

      return view('agregarCapitulos',compact('idLibro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idLibro)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Capitulo  $capitulo
     * @return \Illuminate\Http\Response
     */
    public function show(Capitulo $capitulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Capitulo  $capitulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Capitulo $capitulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Capitulo  $capitulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $capituloActualizado = Capitulo::find($id);
          $request->validate([
          'titulo' => 'required'],
          [
            'titulo.required'=>'Debe ingresar un nombre',
          ]);

          if(!empty($request->capitulo)){
            $capituloActualizado['capitulo']=$request->file('capitulo')->store('uploads','public');
              }
          $capituloActualizado->titulo = $request->titulo;
          $capituloActualizado->save();

    return redirect()->action('LibroController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Capitulo  $capitulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Capitulo $capitulo)
    {
        //
    }
    public function capitulos(Request $request)
    {
       $libro = Libro::findOrFail($request->id);
       return view('verCapitulos',compact('libro'));
    }

}