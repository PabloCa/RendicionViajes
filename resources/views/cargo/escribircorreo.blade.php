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

    {!!Form::model($cargo,['route'=>['cargo/destroy',$cargo],'method'=>'PUT'])!!}

    <div class="form-group">
        {!!Form::label('mensaje','Mensaje:')!!}
        {!!Form::text('nombre_cargo',null,['class'=>'form-control','placeholder'=>'Ingresa el cuerpo del mensaje'])!!}
    </div>
    <div class="btn-toolbar">
        <div class="btn-group">
            {!!Form::submit('Enviar',['class'=>'btn btn-danger'])!!}
            {!!Form::close()!!}
        </div>
        {!!Form::close()!!}
    </div>





@endsection