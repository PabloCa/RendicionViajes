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
        <th>Viaje</th>

        </thead>
        @foreach($viajes as $viaje)
            <tbody>
            <td>{{$viaje->nombre_viaje}}</td>
            <td>
                {!!link_to_route('viaje.edit', $title = 'Editar', $parameters = $viaje, $attributes = ['class'=>'btn btn-primary'])!!}
            </td>
            </tbody>
        @endforeach
    </table>
@endsection