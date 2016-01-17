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
    <th>Solicitante</th>
    <th>Tipo de viaje</th>
    <th>Motivo</th>
    <th></th>


    </thead>
    <?php   $solicitudes = DB::table('solicitudes')->where('estado','pendiente')->get();
    ?>
    @foreach($solicitudes as $solicitud)

    <tbody>
    <td>{{$nombre = DB::table('users')->where('email', $solicitud->email)->pluck('name')}}</td>
    <td>{{$solicitud->nombre_viaje}}</td>
    <td>{{$solicitud->motivo}}</td>
    <td>  <?php echo "<a href = 'detallar/{$solicitud->id}'>detallar</a>"?>
    </td>
    </tbody>
    @endforeach
</table>
@endsection