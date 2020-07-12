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
Route::get('/usuariosEntreFechas', 'Admin@usuariosEntreFechas')->name('usuariosEntreFechas');
Route::get('/librosMasLeidos', 'Admin@librosMasLeidos')->name('librosMasLeidos');



Route::get('/catalogo', 'HomeController@verCatalogo')->name('verCatalogo');
Route::post('/catalogoFiltrado', 'HomeController@catalogoFiltrado')->name('catalogoFiltrado');
Route::get('nuevoPerfil', 'PerfilController@agregarPerfil')->name('nuevoPerfil');
Route::get('agregarPerfil', 'PerfilController@agregarPerfil' )->name('agregarPerfil');
Route::post('cargarPerfil', 'PerfilController@cargarPerfil' )->name('cargarPerfil');
Route::get('perfilActivo/{id}', 'PerfilController@perfilActivo' )->name('perfilActivo');
Route::get('seleccionPerfil', 'PerfilController@seleccionPerfil')->name('seleccionPerfil');
Route::get('/editarPerfil/{id}', 'PerfilController@editarPerfil' )->name('editarPerfil');
Route::put('/editarPerfil/{id}', 'PerfilController@update' )->name('perfil.update');
Route::post('/activarPerfil/{id}', 'PerfilController@activarPerfil')->name('activarPerfil');
Route::post('/desactivarPerfil/{id}', 'PerfilController@desactivarPerfil')->name('desactivarPerfil');
Route::post('/eliminarPerfil/{id}', 'PerfilController@eliminarPerfil')->name('eliminarPerfil');


Route::get('/verCuenta', 'PerfilController@verCuenta')->name('verCuenta');
Route::put('/verCuenta', 'PerfilController@updateCuenta')->name('cuenta.update');
Route::post('/solicitarPremium', 'PerfilController@solicitarPremium')->name('solicitarPremium');
Route::post('/cancelarPremium', 'PerfilController@cancelarPremium')->name('cancelarPremium');


Route::resource('librosCargados','LibroController');
Route::resource('guardarLibro','LibroController');
Route::get('agregarLibro','LibroController@agregarLibro');
Route::delete('/eliminarLibro/{id}', 'LibroController@eliminar')->name('libro.eliminar');
Route::get('/editarLibro/{id}', 'LibroController@editar' )->name('libro.editar');
Route::put('/editarLibro/{id}', 'LibroController@update' )->name('libro.update');
Route::get('/trailer/{id}', 'TrailerController@trailer' )->name('libro.trailer');
Route::get('/comentarios/{id}', 'ComentariosController@comentarios' )->name('libro.comentarios');
Route::post('/agregarCapitulos', 'CapituloController@agregarCapitulos' )->name('agregar.capitulos');
Route::post('/agregarCapitulo', 'CapituloController@agregarCapitulo' )->name('agregar.capitulo');
Route::get('/capitulos/{id}', 'CapituloController@capitulos' )->name('libro.capitulos');
Route::put('/editarCapitulo/{id}', 'CapituloController@update' )->name('capitulo.update');

Route::post('/agregarComentario', 'ComentariosController@agregarComentario' )->name('agregarComentario');
Route::post('/eliminarComentario', 'ComentariosController@eliminar')->name('comentario.eliminar');
Route::post('/agregarFavorito', 'FavoritoController@agregarFavorito' )->name('agregarFavorito');
Route::post('/eliminarFavorito', 'FavoritoController@eliminarFavorito' )->name('eliminarFavorito');
Route::get('/misFavoritos', 'FavoritoController@verFavoritos' )->name('verFavoritos');
Route::post('/agregarCalificacion', 'CalificacionesController@agregarCalificacion' )->name('agregarCalificacion');
Route::get('/verLeidos', 'LecturaController@verLeidos' )->name('verLeidos');
Route::post('/libroLeido', 'PerfilController@libroLeido' )->name('libroLeido');



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



Route::post('/buscar', 'BuscadorController@busqueda' )->name('buscar');
Route::get('/buscar', 'BuscadorController@busqueda' )->name('buscar');
