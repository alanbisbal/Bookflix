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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $perfil=request()->except('_token');
      Perfil::insert($perfil);
      return redirect()->action('HomeController@index');
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
       $perfil['estado']=1;
       Perfil::insert($perfil);
       return redirect()->action('HomeController@index');
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
