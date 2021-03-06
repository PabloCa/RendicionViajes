<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CargoCreateRequest;
use App\Http\Requests\CargoUpdateRequest;
use Illuminate\Http\Request;

use Session;
use Redirect;

class CargoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cargos = \App\Cargo::all();
        return view('cargo.index',compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cargo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CargoCreateRequest $request)
    {
        \App\Cargo::create([

            'nombre_cargo' => $request['nombre_cargo'],

        ]);
        return redirect('/cargo')->with('message','Cargo registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $cargo = \App\Cargo::find($id);
        return view('cargo.escribircorreo',['cargo'=>$cargo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $cargo = \App\Cargo::find($id);
        return view('cargo.edit',['cargo'=>$cargo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(CargoUpdateRequest $request, $id)
    {
        $sol = \App\Solicitud::find($id);
        $sol->estado='rechazada';
        $sol->save();
        \App\Justificacion::create([

            'justificacion' => $request['nombre_cargo'],
            'id' => $id,

        ]);

        Session::flash('message','Solicitud Rechazada');
        return Redirect::to('/evaluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        echo "asdf";/*
        $sol = \App\Solicitud::find($id);
        $sol->estado='aceptada';
        $sol->save();
        Session::flash('message','Solicitud Aceptada');
        return Redirect::to('/evaluar');*/
    }

}
