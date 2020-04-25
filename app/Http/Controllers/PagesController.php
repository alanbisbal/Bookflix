<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
   public function inicio(){
   		return view('bookflix');
   }



public function inicioSesion(){  		
	    $name= 'Alan';
		$password='1234';
		$mail='alan@mail.com';
		$user= [$name,$password,$mail];
   	    return view('inicioSesion',compact('user'));

	}
}