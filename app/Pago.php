<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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