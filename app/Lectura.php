<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
  protected $fillable = [
      'idperfil','idLibro','leido','desde'
  ];
  public function perfil()
    {
        return $this->belongsTo('App\Perfil','idperfil','id');
    }
    public function libro()
    {
        return $this->belongsTo('App\Libro','idLibro','id');
    }
}