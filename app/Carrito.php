<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model {

    protected $table      = 'Carrito';
    protected $fillable   = ['usuario_id'];

}
