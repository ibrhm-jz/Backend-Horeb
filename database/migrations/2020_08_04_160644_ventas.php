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
            $table->string('no_venta');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('telefono');
            $table->string('medida');
            $table->string('descripcion');
            $table->string('cantidad');
            $table->string('status');     
            $table->string('costo_flete');  
            $table->string('precio_unitario');  
            $table->string('ganancia');
            $table->integer('producto_id')->unsigned();            
            $table->foreign('producto_id')->references('id')->on('productos');       
            $table->integer('user_id')->unsigned();            
            $table->foreign('user_id')->references('id')->on('users');
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
