@extends('layouts.jefatura')
@section('content')

    @if(count($errors)>0)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                @foreach($errors->all()as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <?php


    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $porciones = explode("/", $actual_link);
    $resultado = count($porciones);

    $asd = DB::table('solicitudes')->where('id',$porciones[$resultado-1])->first();
    echo "<h2>Detalles de la solicitud</h2> ";
    echo "<br><h4>Motivo del viaje: ".$asd->motivo."</h4>";
    echo "<br><h4>Fecha de envio de solicitud: ".$asd->fecha_sol."</h4>";
    echo "<br><h4>Fecha de inicio del viaje: ".$asd->fecha_ini."</h4>";
    echo "<br><h4>Fecha de regreso del viaje: ".$asd->fecha_fin."</h4>";

    $usuario=DB::table('users')->where('email',$asd->email)->first();
    echo "<br><h2>Detalles del usuario</h2> ";
    echo "<br><h4>Nombre: ".$usuario->name."</h4>";
    echo "<br><h4>Cargo: ".$usuario->charge."</h4>";
    echo "<br><h4>Correo: ".$usuario->email."</h4>";
    echo "<br><h4>Departamento: ".$usuario->department."</h4>";
    echo "<br><h4>Estado: ".$usuario->state."</h4>";

    $viaje=DB::table('viajes')->where('nombre_viaje',$asd->nombre_viaje)->first();
    echo "<br><h2>Detalles del viaje</h2> ";
    echo "<br><h4>Tipo de viaje: ".$asd->nombre_viaje."</h4>";
    echo "<br><h4>Monto Maximo: ".$viaje->monto_max."</h4>";

    $gastos = DB::table('gastos')->where('nombre_viaje',$asd->nombre_viaje)->get();
    echo "<br><h4>Puede gastar en: ";
    foreach($gastos as $gasto){
        echo $gasto->nombre_gasto.", ";
    }
    echo "</h4>";
    ?>

@endsection