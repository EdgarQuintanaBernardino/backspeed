<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparacionCatalogoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparacion_catalogo', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset='utf8mb4';
            $table->collation='utf8mb4_unicode_ci';  
            $table->unsignedBigInteger('reparacion_id');            
            $table->foreign('reparacion_id')->references('id')->on('reparacions')->onDelete('cascade');
            $table->unsignedBigInteger('catalogo_id');            
            $table->foreign('catalogo_id')->references('id')->on('catalogos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparacion_catalogo');
    }
}
