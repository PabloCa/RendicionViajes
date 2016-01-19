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

use Illuminate\Database\Eloquent\Model;
use App\Justificacion;


Route::get('/','FrontController@index');

Route::get('home', 'HomeController@index');

Route::resource('usuario', 'UsuarioController');
Route::resource('usuario_create', 'UsuarioController@create');
Route::resource('log', 'LogController@store');

Route::get('logout','LogController@logout');

Route::resource('viaje', 'ViajeController');


Route::get('detallar/{atributo?}',function($atributo=""){
	if($atributo=="")return view('evaluar.detallar',compact('detallar'));
	else{
		return view('evaluar.detallar',compact('detallar'));
	}
});

Route::get('justificar/{atributo?}',function($atributo=""){
	if($atributo=="")return view('evaluar.justificar',compact('justificar'));
	else{
		return view('evaluar.justificar',compact('justificar'));
	}
});

Route::get('correo/{atributo?}',function($atributo=""){
	if($atributo=="")return view('evaluar.correo',compact('correo'));
	else{
		return view('evaluar.correo',compact('correo'));
	}
});

Route::get('aceptarsol/{atributo?}',function($atributo=""){
	if($atributo=="") return Redirect::to('/evaluar');
	else{
		$sol = \App\Solicitud::find($atributo);
		$sol->estado='aceptada';
		$sol->save();
		Session::flash('message','Solicitud Aceptada');
		return Redirect::to('/evaluar');
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
Route::resource('misolicitudes','ComunController@misolicitudes');




Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


get('/email/{atributo1}/{atributo2}', function($atributo1, $atributo2){
	$sol = DB::table('solicitudes')->where('id',$atributo1)->first();
	$usuario=DB::table('users')->where('email',$sol->email)->first();

	Mail::send('emails.test',['name'=>$usuario->name   , 'correo'=>$atributo2 ],function($message)use($sol){

		$destino=$sol->email;
		$message->to($destino,'someguy')->subject('Sistema rendicion de viajes');
	});
	Session::flash('message','Mensaje enviado');
	return Redirect::to('/evaluar');
});

