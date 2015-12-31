<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;

class FrontController extends Controller
{
	public function __construct(){
			$this->middleware('auth', ['only' => 'admin']);	
	}
	
	public function index(){
	/*header('Location: http://146.83.198.35/~icinf2/index.php/');

	exit;*/
		//view('welcome.php');
		
		return Redirect::to('/index.php/auth/login');
	}
	/*public function contacto(){
		return view('contacto');
	}
	public function reviews(){
		return view('reviews');
	}*/
	public function admin(){
		if(Auth::user()->type == 'administrador') {
			return view('layouts.admin');
		}/*else{
			if(Auth::user()->type == 'comun'){
				return Redirect::to('comun');
			}


		}*/
		return Redirect::to(Auth::user()->type);
	}
}