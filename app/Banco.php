<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support;
class Banco extends Model
{

  public function tarjeta()
  {
      return $this->hasMany('App\Tarjeta');
  }
}