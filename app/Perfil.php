<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Perfil extends Model
{
  public function usuario()
 {
      
        return $this->belongsTo('App\User','email','email');
    }

        public function calificaciones()
          {
              return $this->hasMany('App\Calificaciones');
          }

        public function comentarios()
          {
              return $this->hasMany('App\Comentarios');
          }

        public function lecturas()
          {
              return $this->hasMany('App\Lecturas');
          }

       public function favoritos()
        {
            return $this->hasMany('App\Favorito');
        }

        public function nombre()
         {
             return $this->nombre;
         }
}