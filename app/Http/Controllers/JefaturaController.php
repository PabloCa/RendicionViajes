<?php namespace App\Http\Controllers;

use App\Comun;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Redirect;
use Auth;

class JefaturaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct(){
        $this->middleware('auth', ['only' => ['index', 'estado', 'store', 'create']]);
    }

    public function comun(){

        return view('layouts.comun');
    }

    public function index()
    {
        if(Auth::user()->type == 'jefatura') {
            return view('layouts.jefatura',compact('jefatura'));
        }
        if(Auth::user()->type == 'administrador') {
            Redirect::to('admin');
        }
        return Redirect::to(Auth::user()->type);
    }

    public function versolicitudes()
    {
        if(Auth::user()->type == 'jefatura') {
            return view('jefatura.versolicitudes');
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
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

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
