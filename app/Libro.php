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
          return $this->belongsTo('App\Editorial','idEditorial','id');
        }


      public function autorL()
        {
          return $this->belongsTo('App\Autor','idautor','id');
        }

    public function generoL()
      {
        return $this->belongsTo('App\Genero','idautor','id');
      }


    public function editorialL()
      {
        return $this->belongsTo('App\Editorial ','idautor','id');
      }


    public function generoName()
          {
          return $this->belongsTo('App\Genero','idGenero','id');
          }









}
