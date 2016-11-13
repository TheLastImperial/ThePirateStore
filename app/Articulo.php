<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model {

    protected $table      = 'articulos';
    protected $fillable   = ['nombre','descripcion','precio','cantidad','activo','categoria_id'];

    public function categoria(){
      return $this->belongsTo('App\Categoria');
    }
    public function imagen(){
      return $this->hasMany('App\Imagen');
    }
    public function comentarios(){
      return $this->hasMany('App\Comentario');
    }
}
