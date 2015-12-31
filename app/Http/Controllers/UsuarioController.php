<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;

class UsuarioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 
	public function __construct(){
		$this->middleware('auth');
		
	}
	 
	 
	public function index()
	{
		$users = \App\User::all();
		
		if(Auth::user()->type == 'administrador'){
			return view('usuario.index',compact('users'));
		}else{
			if(Auth::user()->type == 'comun'){
				return Redirect::to('comun');
			}
			
		}
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::user()->type == 'administrador'){
			return view('usuario.create');
		}else{
			if(Auth::user()->type == 'comun'){
				return Redirect::to('comun');
			}
			
		}
		
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		\App\User::create([
			'name' => $request['name'],
			'email' => $request['email'],
			'password' => $request['password'],
			'type' => $request['type'],
			'state' => $request['state'],
			'department' => $request['department'],
		]);
		return redirect('/usuario')->with('message','Usuario registrado correctamente');
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
		$user = \App\User::find($id);
		
		if(Auth::user()->type == 'administrador'){
			return view('usuario.edit',['user'=>$user]);
		}else{
			if(Auth::user()->type == 'comun'){
				return Redirect::to('comun');
			}
			
		}
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$user = \App\User::find($id);
		$user->fill($request->all());
		$user->save();
		Session::flash('message','Usuario Actualizado Correctamente');
		return Redirect::to('/usuario');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		\App\User::destroy($id);
		Session::flash('message','Usuario Eliminado Correctamente');
		return Redirect::to('/usuario');
	}

}
