<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManoObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mano_obras', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->bigIncrements('id');
            $table->string('nom')->nullable()->comment('Nombre de la refacción');
            $table->integer('pre_hora')->nullable()->comment('Precio de horas');
            $table->integer('horas')->nullable()->comment('horas trabajadas');
            $table->integer('subtotal')->nullable()->comment('subtotal de la mano de obra');
          
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
        Schema::dropIfExists('mano_obras');
    }
}
