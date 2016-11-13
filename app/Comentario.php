<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model {

    protected $table    = 'comentarios';
    protected $fillable = ['comentario', 'calificacion', 'activo', 'articulo_id', 'usuario_id'];

    public function usuario(){
      return $this->belongsTo('App\Usuario');
    }
}
