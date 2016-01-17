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
use Illuminate\Support\Facades\Mail;


Route::get('/','FrontController@index');

Route::get('home', 'HomeController@index');

Route::resource('usuario', 'UsuarioController');
Route::resource('usuario_create', 'UsuarioController@create');
Route::resource('log', 'LogController@store');

Route::get('logout','LogController@logout');

Route::resource('viaje', 'ViajeController');

Route::get('detallar/{variable?}', function($variable=""){
	return view('evaluar.detallar',compact('detallar'));
});

Route::get('detallar/{atributo?}',function($atributo=""){
	if($atributo=="")return view('evaluar.detallar',compact('detallar'));
	else{
		return view('evaluar.detallar',compact('detallar'));
	}
});

Route::resource('comun', 'ComunController');

Route::resource('evaluar', 'EvaluarController');

/*Route::get('jefatura/{atributo?}',function($atributo=""){
	if($atributo=="")return view("layouts.jefatura");
	else{
		return view("jefatura".".".$atributo);
	}
});*/

Route::resource('jefatura', 'JefaturaController');

Route::get('admin','FrontController@admin');

Route::resource('cargo', 'CargoController');

Route::resource('viajecargo', 'ViajeCargoController');
Route::resource('comun','ComunController');
Route::resource('estado','ComunController@estado');
Route::resource('solicitud_create','ComunController@create');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


get('/email', function(){
	Mail::send('emails.test',['name'=>'Novica'],function($message){
		$message->to('diarreasangrienta@gmail.com','someguy')->subject('Welcome');
	});
});

