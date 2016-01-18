<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Justificacion extends Model implements AuthenticatableContract{

    use Authenticatable;
    protected $table = 'justificaciones';

    protected $fillable = ['id_justificacion','justificacion','id'];

}
