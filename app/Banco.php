<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
  public function tarjeta()
  {
      return $this->hasMany('App\Tarjeta');
  }
}
