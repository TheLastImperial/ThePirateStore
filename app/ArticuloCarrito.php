<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticuloCarrito extends Model {

    protected $table    = 'ArticuloCarrito';
    protected $fillable = ['carrito_id', 'usuario_id'];

}
