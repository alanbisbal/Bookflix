<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    public function libros()
      {
        return $this->hasMany('App\Libro','idLibro','id');
      }
}
