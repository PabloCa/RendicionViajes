<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model {

	protected  $table = 'solicitudes';

	protected $fillable =['id','fecha_sol','fecha_ini','estado','fecha_fin','id_vinculacion','motivo','nombre_viaje','email'];

}
