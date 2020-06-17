<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support;
class Lectura extends Model
{
  protected $fillable = [
      'id','idperfil','idLibro','leido','desde'
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