<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/perfil/{perf?}', 'PerfilController@index');

Route::get('/nuevo_post', 'PostController@nuevo_post');

Route::post('/guardar_post', 'PostController@guardar_post');

Route::get('/post/{id}/{slug}', 'PostController@ver_post');

Route::get('/editar-perfil','PerfilController@formEditar');

Route::post('/guardar-perfil','PerfilController@guardar');

// Ruta para obtener archivos
Route::get('storage/{archivo}', function ($archivo) {
	$public_path = public_path();
	$url = $public_path.'/storage/'.$archivo;
	//verificamos si el archivo existe y lo retornamos
	if (Storage::exists($archivo))
	{
		return response()->download($url);
	}
	//si no se encuentra lanzamos un error 404.
	abort(404);
});