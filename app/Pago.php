<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  public function tarjeta()
  {
      return $this->belongsTo('App\Tarjeta');
  }
}
