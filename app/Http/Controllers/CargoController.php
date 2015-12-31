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
        $cargo = \App\Cargo::find($id);
        $cargo->fill($request->all());
        $cargo->save();
        Session::flash('message','Cargo Actualizado Correctamente');
        return Redirect::to('/cargo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        \App\Cargo::destroy($id);
        Session::flash('message','Cargo Eliminado Correctamente');
        return Redirect::to('/cargo');
    }

}
