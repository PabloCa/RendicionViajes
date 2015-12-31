<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comun extends Model {

	protected $table='solicitud';

	protected $fillable =['destino','origen','descripcion','estado'];

}
