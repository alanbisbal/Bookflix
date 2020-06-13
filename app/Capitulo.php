<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{

  protected $fillable = [
      'capitulo','nro','idLibro','titulo'
  ];
  public function libro()
    {
        return $this->belongsTo('App\Perfil','idLibro','id');
    }


}