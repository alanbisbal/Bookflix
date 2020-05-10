<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/administracion', 'HomeController@administracion')->name('administracion');

Route::resource('librosCargados','LibroController');
Route::get('agregarLibro','LibroController@agregarLibro');



Route::resource('editorialesCargados','EditorialController');
Route::get('agregarEditorial','EditorialController@agregarEditorial');

Route::resource('autoresCargados','AutorController');
Route::get('agregarAutor','AutorController@agregarAutor');

Route::resource('novedadesCargados','NovedadController');
Route::get('agregarNovedad','NovedadController@agregarNovedad');

Route::resource('generosCargados','GeneroController');
Route::get('agregarGenero','GeneroController@agregarGenero');
