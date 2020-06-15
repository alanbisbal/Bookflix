<?php
namespace App;
use App\Favorito;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{

      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
          'id','isbn', 'desc', 'titulo','img_libro','titulo_trailer','desc_trailer','img_trailer',
          'idGenero','idautor','idEditorial','created_at','updated_at'
      ];
      /**
       * The attributes that should be hidden for arrays.
       *
       * @var array
       */
      protected $hidden = [

      ];

      /**
       * The attributes that should be cast to native types.
       *
       * @var array
       */
      protected $casts = [

      ];
  public function calificaciones()
    {
          return $this->hasMany('App\Calificaciones','idLibro','id');
    }

    public function califProm()
      {
            return $this->calificaciones->average('calif');
      }


  public function comentarios()
    {
        return $this->hasMany('App\Comentarios','idLibro','id');
    }


  public function lecturas()
      {
        return $this->hasMany('App\Lecturas','idLibro','id');
      }


  public function favoritos()
      {
        return $this->hasMany('App\Favorito','idLibro','id');
      }

  public function capitulos()
      {
        return $this->hasMany('App\Capitulo','idLibro','id');
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
        return $this->belongsTo('App\Genero','idGenero','id');
      }



  public function editorialL()
          {
          return $this->belongsTo('App\Editorial','idEditorial','id');
          }


      public function hacerInvisible()
        {
            $this['visible'] = 0;
            $this->save();
          }


    public function id()
            {
              return $this['id'];
              }

    public function esFavorito()
          {
            return $this->favorito;
          }



}