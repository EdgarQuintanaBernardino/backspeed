<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogoCotizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo_cotizacion', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset='utf8mb4';
            $table->collation='utf8mb4_unicode_ci';  
            $table->unsignedBigInteger('catalogo_id');            
            $table->foreign('catalogo_id')->references('id')->on('catalogos')->onDelete('cascade');
            $table->unsignedBigInteger('cotizacion_id');            
            $table->foreign('cotizacion_id')->references('id')->on('cotizacion')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogo_cotizacion');
    }
}
