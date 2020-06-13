<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
use App\User;

class Admin extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function estadisticas()
     {
         $users= User::all();
         return view('estadisticas',compact('users'));
     }

     public function agregarLibro()
     {
         return view('agregarLibro');
     }

    

     public function update()
     {

         return view('test');
     }

     public function agregarAutor()
     {
         return view('agregarAutor');
     }

     public function agregarEditorial()
     {
         return view('agregarEditorial');
     }

     public function agregarNovedad()
     {
         return view('agregarNovedad');
     }
     public function administracion()
     {
         return view('administracion');
     }
     public function perfil()
     {
         return view('perfil');
     }
}