@extends('layouts.comun')

@section('content')
    {!!Form::open(['route'=>'comun.store', 'method'=>'POST'])!!}
    @include('comun.forms.formulario')
    {!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
    {!!Form::close()!!}

@endsection