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

Route::resource('agregarLibro','LibroController');
Route::resource('agregarEditorial','EditorialController');
Route::resource('agregarAutor','AutorController');
Route::resource('agregarNovedad','NovedadController');
Route::resource('agregarGenero','GeneroController');
