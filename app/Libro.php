<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
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

  public function capitulos()
      {
        return $this->hasMany('App\Capitulo');
      }

      public function editorialNombre()
        {
          return $this->belongsTo('App\Editorial','editorial','nombre');
        }


      public function autorL()
        {
          return $this->belongsTo('App\Autor','id');
        }



    public function generoName()
          {
          return $this->belongsTo('App\Genero','genero','nombre');
          }









}
