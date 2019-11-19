<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->bigIncrements('id_detalles');
            $table->integer('detalles_cantidad_prods');
            $table->unsignedBigInteger('Producto_prod_id');
            $table->foreign('Producto_prod_id')->references('id_producto')->on('Productos');
            $table->unsignedBigInteger('Clientes_cli_id');
            $table->foreign('Clientes_cli_id')->references('id_cliente')->on('Clientes');
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
        Schema::dropIfExists('detalles');
    }
}
