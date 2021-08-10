<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecepcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepcion', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->bigIncrements('id');  
            $table->string('cliente')->nullable();
            $table->string('vehiculo')->nullable();
            $table->integer('n_orden')->comment('Numero de orden');
            $table->string('tip_serv');
            $table->string('kilometraje');
            $table->Integer('n_combustible');
            $table->string('desc_falla')->nullable();
            $table->string('obs_general')->nullable();
         
            $table->string('fotos')->nullable()->comment('fotos de recepcion');
            $table->string('componentes')->nullable()->comment('componenetes del carro al entrar en recepcion ');
            $table->string('cantTapetes')->nullable()->comment('cantidad de tapetes');
            $table->string('cantTapones')->nullable()->comment('cantidad de tapones');
            $table->string('cantEspejos')->nullable()->comment('cantidad de espejos');

            $table->unsignedBigInteger('cotizacion_id')->nullable()->comment('Foreign Key');
            $table->foreign('cotizacion_id')->references('id')->on('cotizacion')->onUpdate('restrict')->onDelete('cascade');

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
        Schema::dropIfExists('recepcion');
    }
}
