<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cotizacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $table = "cotizaciones";
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('telefono');
            $table->string('costo_flete');
            $table->string('ganancia');   
            $table->string('status');     
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
        Schema::dropIfExists('cotizaciones');
    }
}
