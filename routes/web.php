<?php

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

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>'auth'],function(){

	Route::get('/admin',[
		'uses'=>'HomeController@admin',
		'as'=>'perfil.admin'
	]);

	Route::get('/evento/crear',[
		'uses'=>'eventos@crear',
		'as'=>'eventos.crear',
			
	]);
	Route::post('/evento/crear',[
		'uses'=>'eventos@crearPost',
		'as'=>'eventos.crearPost',
			
	]);
	Route::post('/evento/votar',[
		'uses'=>'eventos@votos',
		'as'=>'eventos.votos',
			
	]);

	Route::get('/maestro',[
		'uses'=>'HomeController@maestro',
		'as'=>'perfil.maestro'
	]);

	Route::get('/calificaciones/crear',[
		'uses'=>'calificaciones@crear',
		'as'=>'calificaciones.crear'
	]);
	Route::post('/calificaciones/crear',[
		'uses'=>'calificaciones@crearPost',
		'as'=>'calificaciones.crearPost'
	]);

	Route::get('/calificaciones/ver-alumnos/{id}',[
		'uses'=>'calificaciones@getCalificaciones',
		'as'=>'calificaciones.getCalificaciones'
	]);

	Route::get('/calificaciones/ver-calificaciones/{id}',[
		'uses'=>'calificaciones@getCali',
		'as'=>'calificaciones.getCali'
	]);



});
