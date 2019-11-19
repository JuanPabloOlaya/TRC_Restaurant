<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id_pedido');
            $table->double('valor_total_pedido');
            $table->enum('estado_pedido',['EN ESPERA','HACIENDOSE', 'PARA ENTREGAR', 'EN CAMINO', 'ENTREGADO'])->default('EN ESPERA');
            $table->unsignedBigInteger('Cliente_cli_id');
            $table->foreign('Cliente_cli_id')->references('id_cliente')->on('Clientes');
            $table->unsignedBigInteger('Domiciliario_dom_id')->default('0');
            $table->foreign('Domiciliario_dom_id')->references('id_domiciliario')->on('Domiciliarios');
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
        Schema::dropIfExists('pedidos');
    }
}
