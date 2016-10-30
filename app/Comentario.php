<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model {

    protected $table    = 'Comentario';
    protected $fillable = ['comentario', 'calificacion', 'activo', 'articulo_id', 'categoria_id'];

}
