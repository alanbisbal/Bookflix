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
Route::get('/Administracion', 'HomeController@administracion')->name('administracion');
Route::get('/Administracion/Agregarlibro', 'Admin@agregarLibro')->name('agregarLibro');
Route::get('/Administracion/agregarAutor', 'Admin@agregarAutor')->name('agregarAutor');
Route::get('/Administracion/agregarEditorial', 'Admin@agregarEditorial')->name('agregarEditorial');
Route::get('/Administracion/agregarNovedad', 'Admin@agregarNovedad')->name('agregarNovedad');
Route::get('/test')->name('test');
Route::get('/perfil', 'Admin@perfil')->name('perfil');
