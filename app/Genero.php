<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support;
class Genero extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nombre',
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
  public function libros()
    {
      return $this->hasMany('App\Libro','id','id');
    }



      public function hacerInvisible()
        {
            $this['visible'] = 0;
            $this->save();
          }
}