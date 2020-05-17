<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{

      public function perfil()
        {
            return $this->belongsTo('App\Perfil','id','id');
        }
        public function libro()
        {
            return $this->belongsTo('App\Perfil','id','id');
        }
}
