@extends('layouts.comun')

@section('content')
    <table class="table">
        <thead>
        <th>Destino</th>
        <th>Origen</th>
        <th>Descripcion</th>
        <th>Estado</th>
        </thead>
        @foreach($solicitudes as $solicitud)
            <tbody>
        <td>{{$solicitud->destino}}</td>
        <td>{{$solicitud->origen}}</td>
        <td>{{$solicitud->descripcion}}</td>
        <td>{{$solicitud->estado}}</td>

            </tbody>
        @endforeach
    </table>
@endsection


