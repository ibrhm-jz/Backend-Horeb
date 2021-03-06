<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $table = "productos";
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('medida');
            $table->string('categoria');
            $table->float('precio_unitario');  
            $table->float('cantidad_existencia');          
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
        Schema::dropIfExists('productos');
    }
}
