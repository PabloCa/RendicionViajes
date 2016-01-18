<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ViajeCreateRequest;
use App\Http\Requests\ViajeUpdateRequest;
use Illuminate\Http\Request;

use Session;
use Redirect;

class ViajeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct(){
		$this->middleware('auth', ['only' => ['index', 'edit', 'store', 'create','update','destroy']]);
	}
	public function index()
	{
		$viajes = \App\Viaje::all();
		return view('viaje.index',compact('viajes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('viaje.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ViajeCreateRequest $request)
	{
		\App\Viaje::create([

				'nombre_viaje' => $request['nombre_viaje'],
				'monto_max' => $request['monto_max']

		]);
		return redirect('/viaje')->with('message','Viaje registrado correctamente');
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
		$viaje = \App\Viaje::find($id);
		return view('viaje.edit',['viaje'=>$viaje]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ViajeUpdateRequest $request, $id)
	{
		$viaje = \App\Viaje::find($id);
		$viaje->fill($request->all());
		$viaje->save();
		Session::flash('message','Viaje Actualizado Correctamente');
		return Redirect::to('/viaje');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		\App\Viaje::destroy($id);
		Session::flash('message','Viaje Eliminado Correctamente');
		return Redirect::to('/viaje');
	}

}
