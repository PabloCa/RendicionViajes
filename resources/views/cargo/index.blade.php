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
        <th>Cargos</th>

        </thead>
        @foreach($cargos as $cargo)
            <tbody>
            <td>{{$cargo->nombre_cargo}}</td>
            <td>
                {!!link_to_route('cargo.edit', $title = 'Editar', $parameters = $cargo, $attributes = ['class'=>'btn btn-primary'])!!}
            </td>
            </tbody>
        @endforeach
    </table>
@endsection