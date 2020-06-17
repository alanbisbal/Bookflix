<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support;
class Pago extends Model
{

  protected $fillable = [
      'idTarjeta','monto',
  ];

  public function tarjeta()
  {
      return $this->belongsTo('App\Tarjeta');
  }

}