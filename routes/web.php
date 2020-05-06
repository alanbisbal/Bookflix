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
Route::get('/agregarLibro', 'HomeController@agregarLibro')->name('agregarLibro');
Route::get('/agregarNovedad', 'HomeController@agregarNovedad')->name('agregarNovedad');
Route::get('/agregarAutor', 'HomeController@agregarAutor')->name('agregarAutor');
Route::get('/agregarEditorial', 'HomeController@agregarEditorial')->name('agregarEditorial');
