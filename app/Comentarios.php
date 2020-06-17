<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support;
class Comentarios extends Model
{
  protected $fillable = [
      'id','idperfil','desc','idLibro',
  ];
  public function perfil()
    {
        return $this->belongsTo('App\Perfil','idperfil','id');
    }
    public function libro()
    {
        return $this->belongsTo('App\Libro','idLibro','id');
    }
}