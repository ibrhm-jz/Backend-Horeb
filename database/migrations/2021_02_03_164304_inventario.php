<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inventario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $table = "inventarios";
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('concepto');
            $table->string('entradas');
            $table->string('salidas');
            $table->string('existencia');  
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
        Schema::dropIfExists('inventarios');
    }
}
