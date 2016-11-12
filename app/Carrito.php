<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model {

    protected $table      = 'carritos';
    protected $fillable   = ['usuario_id'];

    public function usuario(){
      return $this->belongsTo('App\Carrito');
    }
    public function ventas(){
      return $this->hasMany('App\Venta');
    }
    public function articuloCarrito(){
      return $this->hasMany('App\ArticuloCarrito');
    }
}
