@extends('layouts.jefatura')

@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('message')}}
    </div>
@endif

@section('content')

    <table class="table">
        <thead>
        <th>Id viaje</th>
        <th>Motivo</th>
        <th>Fecha inicio</th>
        <th>Fecha fin</th>
        <th>Estado</th>

        </thead>
        <?php   $solicitudes = DB::table('solicitudes')->get();
        ?>
        @foreach($solicitudes as $solicitud)
            <tbody>
            <td>{{$solicitud->id_viaje}}</td>
            <td>{{$solicitud->motivo}}</td>
            <td>{{$solicitud->fecha_ini}}</td>
            <td>{{$solicitud->fecha_fin}}</td>
            <td>{{$solicitud->estado}}</td>

            </tbody>
        @endforeach
    </table>
@endsection