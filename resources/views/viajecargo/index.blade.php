@extends('layouts.admin')

@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('message')}}
    </div>
@endif

@section('content')

    <table class="table">
        <thead>
        <th>Vinculaciones</th>

        </thead>
        <?php

        $viajescargos = DB::table('viajes_cargos')->get();

        //var_dump($viajescargos[0]);
        $arrlength = count($viajescargos);

        for($x = 0; $x < $arrlength; $x++) {
            $properties = get_object_vars($viajescargos[$x]);
            echo "<tbody>";
            echo "<td>".$properties['nombre_cargo']."</td>";
            echo "<td>".$properties['nombre_viaje']."</td>";
            echo "</tbody>";
        }
            
        ?>


    </table>
@endsection