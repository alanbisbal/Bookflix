<?php

namespace App\Http\Controllers;

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
        return view('home');
    }
    public function administracion()
    {
        return view('administracion');
    }
    public function agregarLibro()
    {
        return view('agregarLibro');
    }
    public function agregarAutor()
    {
        return view('agregarAutor');
    }
    public function agregarNovedad()
    {
        return view('agregarNovedad');
    }
    public function agregarEditorial()
    {
        return view('agregarEditorial');
    }

}
