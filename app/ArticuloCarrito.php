<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticuloCarrito extends Model {

    protected $table    = 'articulo_carritos';
    protected $fillable = ['carrito_id', 'usuario_id'];

}
