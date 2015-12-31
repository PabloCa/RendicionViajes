<div class="form-group" xmlns="http://www.w3.org/1999/html">
    {!!Form::label('destino','Destino:')!!}
    {!!Form::text('destino',null,['class'=>'form-control','placeholder'=>'Ingresa el destino del viaje'])!!}
</div>

<div class="form-group">
    {!!Form::label('origen','Origen:')!!}
    {!!Form::text('origen',null,['class'=>'form-control','placeholder'=>'Ingresa el origen del viaje'])!!}
</div>

<div class="form-group">
    {!!Form::label('descripcion','Descripcion:')!!}
    {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese descripcion del viaje'])!!}
</div>

<div class="form-group">
  <!--  {!!Form::label('tipo_viaje','Tipo de viaje:')!!}--!>

    <div class="form-group">
        <div class="btn-group">
            <!--    <button type="button" class="btn btn-default">tipo de viaje</button>

            <button type="button" class="btn btn-default dropdown-toggle"
                    data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Desplegar menu</span>
            </button>

            <ul class="dropdown-menu" role="menu">

                @foreach($datos as $dato)
                    <li><a>{{$dato->nombre_viaje}}</a></li>
              @endforeach
                    !-->
            </ul>
          </div>

    </div>

</div>
