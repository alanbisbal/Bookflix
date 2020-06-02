<?php

namespace App\Http\Controllers;
use App\User;
use App\Perfil;
use Illuminate\Http\Request;




use Illuminate\Foundation\Auth\AuthenticatesUsers;


class PerfilController extends Controller
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

    public function seleccionPerfil()
    {
        $perfiles=Perfil::where("email","=",auth()->user()->email)->get()->sortBy('nombre');
        $cant;
        if (auth()->user()->es_premium) {
          $cant=4;
        }
        else{
          $cant=2;
        }
        $cant = $cant - sizeof($perfiles);
        return view('seleccionPerfil',compact('perfiles','cant'));
    }

    public function agregarPerfil()
    {
        return view('agregarPerfil');
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
    public function activarPerfil($id)
    {
      $perfil = Perfil::findOrFail($id);
        session(['perfil' => $perfil]);
      return redirect('home');

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
      $perfil=request()->except('_token');
      if($request->hasFile('imagen')){
            $perfil['imagen']=$request->file('imagen')->store('uploads','public');
      }
      Perfil::insert($perfil);
      return redirect()->action('PerfilController@seleccionPerfil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Perfil $perfil)
     {
         //
     }
     public function cargarPerfil(Request $request,Perfil $perfil)
     {
       $request->validate([
         'nombre' => 'required',]);
       $cantidad_perfiles = Perfil::find(auth()->user()->email);
       $perfil=request()->except('_token');
       $perfil['email']=auth()->user()->email;
       if(is_null($cantidad_perfiles))
       {
          $perfil['nro']=1;
       }
       else{
         $perfil['nro']= (size($cantidad_perfiles)+1) ;
       }
       if($request->hasFile('imagen')){
             $perfil['imagen']=$request->file('imagen')->store('uploads','public');
       }
       $perfil['estado']=1;
       Perfil::insert($perfil);
       return redirect()->action('PerfilController@seleccionPerfil');
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}