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

    {!!Form::model($viaje,['route'=>['viaje.update',$viaje],'method'=>'PUT'])!!}

    <div class="form-group">
        {!!Form::label('viaje','Viaje:')!!}
        {!!Form::text('nombre_viaje',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre del viaje'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('viaje','Monto maximo:')!!}
             {!!Form::text('monto_max',null,['class'=>'form-control','placeholder'=>'Ingresa el monto maximo'])!!}
    </div>
    <div class="btn-toolbar">
        <div class="btn-group">
            {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
            {!!Form::close()!!}
        </div>
        <div class="btn-group">
            {!!Form::open(['route'=>['viaje.destroy', $viaje], 'method' => 'DELETE'])!!}
            {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
        </div>
            {!!Form::close()!!}
    </div>
@endsection