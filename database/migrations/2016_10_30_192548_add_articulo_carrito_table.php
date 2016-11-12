<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArticuloCarritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_carritos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('carrito_id')->unsigned();
            $table->integer('articulo_id')->unsigned();
            $table->integer('cantidad');
            
            $table->foreign('carrito_id')->references('id')->on('carritos');
            $table->foreign('articulo_id')->references('id')->on('articulos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo_carritos');
    }
}
