<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ViajeCargoCreateRequest;
use App\Http\Requests\ViajeCargoUpdateRequest;
use Illuminate\Http\Request;

use Session;
use Redirect;

class ViajeCargoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cargos = \App\ViajeCargo::all();
        return view('viajecargo.index',compact('viajecargo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('viajecargo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ViajeCargoCreateRequest $request)
    {
        \App\ViajeCargo::create([

            'nombre_cargo' => $request['nombre_cargo'],
            'nombre_viaje' => $request['nombre_viaje'],

        ]);
        return redirect('/viajecargo')->with('message','Vinculacion registrada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($nombre_cargo, $nombre_viaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($nombre_cargo, $nombre_viaje)
    {
        $viajes_cargos = \App\ViajeCargo::find($nombre_cargo, $nombre_viaje);
        return view('viajecargo.edit',['viajecargo'=>$viajes_cargos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(ViajeCargoUpdateRequest $request, $nombre_cargo, $nombre_viaje)
    {
        $viajes_cargos = \App\ViajeCargo::find($nombre_cargo, $nombre_viaje);
        $viajes_cargos->fill($request->all());
        $viajes_cargos->save();
        Session::flash('message','Cargo Actualizado Correctamente');
        return Redirect::to('/viajecargo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($nombre_cargo, $nombre_viaje)
    {
        \App\cargo::destroy($nombre_cargo, $nombre_viaje);
        Session::flash('message','Cargo Eliminado Correctamente');
        return Redirect::to('/viajecargo');
    }

}
