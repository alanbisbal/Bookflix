<?php

namespace App\Http\Controllers;

use App\Novedad;
use App\Perfil;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $novedades= Novedad::all();
        $perfiles=Perfil::where("email","=",auth()->user()->email);
        return view('home',compact('novedades','perfiles'));
    }

    public function administracion()
    {
        return view('administracion');
    }
    public function nuevoPerfil()
    {
        return view('nuevoPerfil');
    }
}
