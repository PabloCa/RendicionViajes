<?php namespace App\Http\Controllers;

use App\Justificacion;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\EvaluarCreateeRequest;
use App\Http\Requests\EvaluarUpdateRequest;
use Illuminate\Support\Facades\App;
use Redirect;
use Auth;



class EvaluarController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function index()
    {


        if(Auth::user()->type == 'jefatura') {
            return view('evaluar.index',compact('evaluar'));
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
        $solicitud = \App\Solicitud::find($id);
        return view('evaluar.edit',['evaluar'=>$solicitud]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        echo $id;
        echo "hola";
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
