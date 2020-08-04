<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ventas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $table = "ventas";
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_factura');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('medida');
            $table->string('descripcion');   
            $table->string('total');   
            $table->integer('empresa_id')->unsigned();            
            $table->foreign('empresa_id')->references('id')->on('empresa');
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
        Schema::dropIfExists('ventas');
    }
}
