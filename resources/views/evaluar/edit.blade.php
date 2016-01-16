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

    {!!Form::model($solicitud,['route'=>['evaluar.update',$solicitud],'method'=>'PUT'])!!}

    <div class="form-group">
        {!!Form::label('solicitud','Solicitud:')!!}
        {!!Form::text('nombre_viaje',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre del viaje'])!!}
    </div>
    <div class="btn-toolbar">
        <div class="btn-group">
            {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
            {!!Form::close()!!}
        </div>

        {!!Form::close()!!}
    </div>
@endsection