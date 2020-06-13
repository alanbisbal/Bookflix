<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
  protected $fillable = [
      'idperfil','idLibro',
  ];
  public function perfil()
    {
        return $this->belongsTo('App\Perfil','idperfil','id');
    }
    public function libro()
    {
        return $this->belongsTo('App\Libros','idLibro','id');
    }
}