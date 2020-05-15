<?php

namespace App\Http\Controllers;
use App\Autor;
use App\Editorial;
use App\Libro;
use App\Genero;
use Illuminate\Http\Request;

class LibroController extends Controller
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
      $libros=Libro::all();
          return view('librosCargados',['libros'=>$libros]);
    }
    public function agregarLibro()
    {
      $autores=Autor::all();
      $editoriales=Editorial::all();
      $generos=Genero::all();
          return view('agregarLibro',['editoriales'=>$editoriales,'autores'=>$autores,'generos'=>$generos]);
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
      $datoLibro=request()->except('_token');

      if($request->hasFile('img_libro')){
            $datoLibro['img_libro']=$request->file('img_libro')->store('uploads','public');
      }
      if($request->hasFile('img_trailer')){
            $datoLibro['img_trailer']=$request->file('img_trailer')->store('uploads','public');
      }
      Libro::insert($datoLibro);
      return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id){

     $libroActualizado = Libro::find($id);
     $libroActualizado ->isbn = $request->isbn;
     $libroActualizado ->desc = $request->desc;
     $libroActualizado ->titulo = $request->titulo;
     $libroActualizado ->i = $request->img_libro;
     $libroActualizado ->titulo_trailer = $request->titulo_trailer;
     $libroActualizado ->img_trailer = $request->img_trailer;
     $libroActualizado ->editorial = $request->editorial;
     $libroActualizado ->idautor = $request->idautor;
     $libroActualizado ->genero = $request->genero;
     $libroActualizado->save();
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
       $libroEliminar = Libro::findOrFail($id);
       $libroEliminar->delete();
     return $this->index();
     }


     public function editar($id){
     $libro = Libro::findOrFail($id);
     $generos = Genero::all()->sortBy('nombre');
     $editoriales =Editorial::all()->sortBy('nombre');
     $autores =Autor::all()->sortBy('nombre');
     return view('editarLibro', compact('libro','generos','editoriales','autores'));
 }
}
