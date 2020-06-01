<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tarjeta extends Model
{
  public function usuario()
  {
      return $this->belongsTo('App\User','email','email');
  }

  public function banco()
  {
      return $this->belongsTo('App\Banco','idBanco','id');
  }

  public function pagos()
  {
      return $this->hasMany('App\Pago');
  }
}