<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','CategoriaController@index');
Route::get('/categorias/{categoria}','ArticuloController@articulosCategoria');
Route::get('/articulo/{id}','ArticuloController@articulo');
Route::post('/buscar','ArticuloController@buscar');
/* Carrito */
Route::post('/articulocarrito/agregar','ArticuloCarritoController@agregar')->middleware('auth');
Route::get('/carrito','CarritoController@mostrar')->middleware('auth');
Route::post('/venta','VentaController@comprar')->middleware('auth');
/* Usuarios */
Route::post('/ingresar','UsuarioController@login');
Route::get('/registro', function () {
	return view('registro');
});
Route::get('/login', function () {
	return view('login');
});
Route::get('/miscompras','UsuarioController@listaCompras')->middleware('auth');
Route::get('/miscompras/{id}','UsuarioController@generarComprobante')->middleware('auth');
Route::post('/registro/registrar','UsuarioController@register');
Route::get('/salir','UsuarioController@logout');

Route::post('/comentario','ComentarioController@comentar')->middleware('auth');
