<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model {

    protected $table      = 'Articulo';
    protected $fillable   = ['nombre','descripcion','precio','cantidad','activo','categoria_id'];

}
