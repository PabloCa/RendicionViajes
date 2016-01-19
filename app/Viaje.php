<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class Viaje extends Model implements AuthenticatableContract{

    use Authenticatable;

    protected $table = 'viajes';

    protected $fillable = ['nombre_viaje','monto_max'];

}
