<?php namespace App\Http\Controllers;

use App\Comun;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Redirect;
use Auth;
use DB;
class ComunController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 
	public function __construct(){
			$this->middleware('auth', ['only' => ['index', 'misolicitudes', 'store', 'create']]);
	}

	public function comun(){

		return view('layouts.comun');
	}

	public function index()
	{
		if(Auth::user()->type == 'comun') {
			return view('layouts.comun',compact('comun'));
		}else{
			if(Auth::user()->type == 'administrador'){
				return Redirect::to('admin');
			}
		}
		
	}

	public function estado(){
		$solicitudes=\App\Comun::all();

		if(Auth::user()->type == 'comun') {
			return view ('comun.estado',compact('solicitudes') );
		}else{
			if(Auth::user()->type == 'administrador'){
				return Redirect::to('admin');
			}
		}


	}

	public function misolicitudes()
	{

		if(Auth::user()->type == 'comun') {

        $solicitudes = DB::table('solicitudes')
			->orderBy('solicitudes.id', 'desc')
			->join('users',function($join){
				$join->on('users.email', '=', 'solicitudes.email')
					->where('users.id','=',Auth::user()->id);
			})
			->get();
			return view('comun.misolicitudes',compact('solicitudes'));
		}
		if(Auth::user()->type == 'administrador') {
			Redirect::to('admin');
		}
		return Redirect::to(Auth::user()->type);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	$datos=\App\Viaje::all();
		
		if(Auth::user()->type == 'comun') {
			return view('comun.create',compact('datos'));	
		}else{
			if(Auth::user()->type == 'administrador'){
				return Redirect::to('admin');
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
		\App\Comun::create([

			'destino'=> $request['destino'],
			'origen'=> $request['origen'],
			'descripcion'=> $request['descripcion'],
			'estado'=>'Pendiente',
		]);

		if ( !empty($_POST['destino']) ) $destino = $_POST['destino']; else $error = true;
		if ( !empty($_POST['origen']) ) $origen = $_POST['origen']; else $error = true;
		if ( !empty($_POST['descripcion']) ) $descripcion = $_POST['descripcion']; else $error = true;

		if ( !empty($error) ) {
		header( 'Location: contacto_error.php' );
		die;
	}
		return redirect('/comun')->with('message','Solicitud registrada correctamente');
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
