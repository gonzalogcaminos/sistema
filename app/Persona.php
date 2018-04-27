<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $fillable = ['nombre','apellido','documento','direccion','mail','area','observacion','fecha','condicion'];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public $timestamps = false;
}
