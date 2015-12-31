@extends('layouts.admin')
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

    {!!Form::model($cargo,['route'=>['cargo.update',$cargo],'method'=>'PUT'])!!}

    <div class="form-group">
        {!!Form::label('cargo','Cargo:')!!}
        {!!Form::text('nombre_cargo',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre del cargo'])!!}
    </div>
    <div class="btn-toolbar">
        <div class="btn-group">
            {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
            {!!Form::close()!!}
        </div>
        <div class="btn-group">
            {!!Form::open(['route'=>['cargo.destroy', $cargo], 'method' => 'DELETE'])!!}
            {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
        </div>
        {!!Form::close()!!}
    </div>
@endsection