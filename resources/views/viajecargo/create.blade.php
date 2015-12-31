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
    {!!Form::open(['route'=>'viajecargo.store', 'method'=>'POST'])!!}

    <div class="form-group">
        {!!Form::label('vincular','Vincular ')!!}
        {!!Form::label('cargo',' Cargo: ')!!}

        <?php
            $cargos = DB::table('cargos')->get();
            echo "<select name='nombre_cargo'>";
            foreach ($cargos as $cargo)
            {
                echo" <option value='".$cargo->nombre_cargo."'>".$cargo->nombre_cargo."</option>";
            }
            echo "</select>";
        ?>

        {!!Form::label('viaje',' Viaje: ')!!}
        <?php
            $viajes = DB::table('viajes')->get();
            echo "<select name='nombre_viaje'>";
            foreach ($viajes as $viaje)
            {
                echo" <option value='".$viaje->nombre_viaje."'>".$viaje->nombre_viaje."</option>";
            }
            echo "</select>";
        ?>

    </div>

    {!!Form::submit('Vincular',['class'=>'btn btn-primary'])!!}
    {!!Form::close()!!}
@endsection