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
    {!!Form::open(['route'=>'cargo.store', 'method'=>'POST'])!!}

    <div class="form-group">
        {!!Form::label('cargo','Cargo:')!!}
        {!!Form::text('nombre_cargo',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre del cargo'])!!}
    </div>

    {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
    {!!Form::close()!!}
@endsection