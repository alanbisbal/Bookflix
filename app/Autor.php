<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Autor extends Model
{

  protected $fillable = [
      'nombre'];

    public function libros()
      {
        return $this->hasMany('App\Libro','id','id');
      }
}
