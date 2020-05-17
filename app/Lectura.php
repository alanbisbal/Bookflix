<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
  public function perfil()
    {
        return $this->belongsTo('App\Perfil');
    }
    public function libro()
    {
        return $this->belongsTo('App\Perfil');
    }
}
