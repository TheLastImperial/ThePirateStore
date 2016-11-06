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
Route::get('/registro', function () {
	return view('registro');
});
Route::post('/login','UsuarioController@login');
Route::post('/registro/registrar','UsuarioController@register');
Route::get('/salir','UsuarioController@logout');
