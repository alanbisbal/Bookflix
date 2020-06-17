<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support;

class Tarjeta extends Model
{

  protected $fillable = [
      'numero','titular','codigo','idBanco','email',
  ];
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