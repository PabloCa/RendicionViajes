<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ViajeCargo extends Model {

    protected $table = 'viajes_cargos';

    protected $fillable = ['nombre_cargo','nombre_viaje'];

}
