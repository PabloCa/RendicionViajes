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

asdasdasdsaddsa
    <?php


    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo $actual_link;
    echo"--------";
    $porciones = explode("/", $actual_link);
    $resultado = count($porciones);
    echo $porciones[$resultado-1];
    $asd = DB::table('solicitudes')->where('id',$porciones[$resultado-1])->first();
    echo $asd->motivo;



    ?>

@endsection