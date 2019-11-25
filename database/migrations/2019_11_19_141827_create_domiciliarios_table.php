<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomiciliariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domiciliarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_domiciliario');
            $table->string('telefono_domiciliario');
            $table->string('tipo_doc_domiciliario');
            $table->string('num_doc_domiciliario');
            $table->enum('estado_domiciliario',['DISPONIBLE','CON ENCARGO','NO DISPONIBLE']);
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
        Schema::dropIfExists('domiciliarios');
    }
}
