<?php

namespace App\Http\Controllers;
use App\Libro;

class TrailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {

     }
    public function index()
    {

    }
    public function trailer($id)
    {

      $libro=Libro::find($id);
      return view('trailer',compact('libro'));
    }

}