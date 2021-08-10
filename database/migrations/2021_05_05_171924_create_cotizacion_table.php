<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->bigIncrements('id');
            $table->string('tip_orden')->nullable()->comment('Tipo de orden');
            $table->integer('t_sin_iva')->nullable()->comment('total sin iva');
            $table->integer('t_con_iva')->nullable()->comment('total con iva');
            $table->integer('t_descuento')->nullable()->comment('total con descuento');
            $table->integer('gran_total')->nullable()->comment('total final');
           
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizacion');
    }
}
