<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
  public function perfiles()
    {
        return $this->belongsToMany('App\Perfil');
    }
    public function libros()
    {
        return $this->belongsToMany('App\Libros');
    }
}