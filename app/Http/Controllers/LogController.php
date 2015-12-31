<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use Session;
use Redirect;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LogController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('layouts.admin');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(LoginRequest $request)
	{
		if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])){


			if(Auth::user()->type == 'administrador'){
				return Redirect::to('admin');
			}else{
				if(Auth::user()->type == 'comun'){
					return Redirect::to('comun');
				}
				
			}

			/*if(strcmp(Auth::user()->type,'administrador')==0){
				return Redirect::to('usuario');
			}else{
				return 'Usted no es Administrador';
			}*/

			/*
			if(Auth::user()->type='comun'){
				return Redirect::to('vista_usuario_comun');
			}
			if(Auth::user()->type='acreditador'){
				return Redirect::to('vista_usuario_acreditador');
			}
			*/

		}

		Session::flash('message-error','Datos son incorrectos');
		return Redirect::to('/auth/login');
	}

	public function logout(){

		Auth::logout();
		return Redirect::to('/auth/login');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
