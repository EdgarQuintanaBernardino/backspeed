<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vehiculo', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset='utf8mb4';
            $table->collation='utf8mb4_unicode_ci';  
            $table->unsignedBigInteger('user_id');            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('vehiculo_id');            
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_vehiculo');
    }
}
