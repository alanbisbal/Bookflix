<?php

use Illuminate\Support\Facades\Route;

use App\Novedad;
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
    $novedades= Novedad::all();
    return view('welcome',compact('novedades'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/administracion', 'Admin@administracion')->name('administracion');
Route::get('/estadisticas', 'Admin@estadisticas')->name('admin.estadisticas');



Route::get('nuevoPerfil', 'PerfilController@agregarPerfil')->name('nuevoPerfil');
Route::get('agregarPerfil', 'PerfilController@agregarPerfil' )->name('agregarPerfil');
Route::post('cargarPerfil', 'PerfilController@cargarPerfil' )->name('cargarPerfil');
Route::get('activarPerfil/{id}', 'PerfilController@activarPerfil' )->name('activarPerfil');
Route::get('seleccionPerfil', 'PerfilController@seleccionPerfil')->name('seleccionPerfil');
Route::get('/verCuenta', 'PerfilController@verCuenta')->name('verCuenta');
Route::put('/verCuenta', 'PerfilController@updateCuenta')->name('cuenta.update');

Route::resource('librosCargados','LibroController');
Route::resource('guardarLibro','LibroController');
Route::get('agregarLibro','LibroController@agregarLibro');
Route::delete('/eliminarLibro/{id}', 'LibroController@eliminar')->name('libro.eliminar');
Route::get('/editarLibro/{id}', 'LibroController@editar' )->name('libro.editar');
Route::put('/editarLibro/{id}', 'LibroController@update' )->name('libro.update');
Route::get('/trailer/{id}', 'TrailerController@trailer' )->name('libro.trailer');
Route::post('/agregarCapitulos', 'CapituloController@agregarCapitulos' )->name('agregar.capitulos');
Route::post('/agregarCapitulo', 'CapituloController@agregarCapitulo' )->name('agregar.capitulo');


Route::post('/agregarComentario', 'ComentariosController@agregarComentario' )->name('agregarComentario');
Route::post('/agregarFavorito', 'FavoritoController@agregarFavorito' )->name('agregarFavorito');
Route::post('/eliminarFavorito', 'FavoritoController@eliminarFavorito' )->name('eliminarFavorito');





Route::resource('editorialesCargados','EditorialController');
Route::get('agregarEditorial','EditorialController@agregarEditorial');
Route::delete('/eliminarEditorial/{id}', 'EditorialController@eliminar')->name('editorial.eliminar');
Route::get('/editarEditorial/{id}', 'EditorialController@editar' )->name('editorial.editar');
Route::put('/editarEditorial/{id}', 'EditorialController@update' )->name('editorial.update');


Route::resource('autoresCargados','AutorController');
Route::get('agregarAutor','AutorController@agregarAutor');
Route::delete('/eliminarAutor/{id}', 'AutorController@eliminar')->name('autor.eliminar');
Route::get('/editarAutor/{id}', 'AutorController@editar' )->name('autor.editar');
Route::put('/editarAutor/{id}', 'AutorController@update' )->name('autor.update');


Route::resource('novedadesCargados','NovedadController');
Route::get('agregarNovedad','NovedadController@agregarNovedad');
Route::delete('/eliminarNovedad/{id}', 'NovedadController@eliminar')->name('novedad.eliminar');
Route::get('/editarNovedad/{id}', 'NovedadController@editar' )->name('novedad.editar');
Route::put('/editarNovedad/{id}', 'NovedadController@update' )->name('novedad.update');


Route::resource('generosCargados','GeneroController');
Route::get('agregarGenero','GeneroController@agregarGenero');
Route::delete('/eliminarLGenero/{id}', 'GeneroController@eliminar')->name('genero.eliminar');
Route::get('/editarGenero/{id}', 'GeneroController@editar' )->name('genero.editar');
Route::put('/editarGenero/{id}', 'GeneroController@update' )->name('genero.update');