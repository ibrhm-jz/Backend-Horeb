<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Entregas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $table = "entregas";
    public function up()
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lugar_entrega');
            $table->string('fecha_entrega');
            $table->string('ubicacion_entrega');
            $table->string('status_entrega');
            $table->string('descripcion');
            $table->string('responsable_entrega');    
            $table->integer('miembro_id')->unsigned();            
            $table->foreign('miembro_id')->references('id')->on('users');
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
        Schema::dropIfExists('entregas');
    }
}
