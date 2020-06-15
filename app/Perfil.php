<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Perfil extends Model
{
    protected $fillable = [
      'id','nombre','email','imagen'
    ];
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
              return $this->hasMany('App\Lecturas','idperfil','id');
          }

       public function favoritos()
        {
              return $this->hasMany('App\Favorito','idperfil','id');
        }

        public function nombre()
         {
             return $this->nombre;
         }
}