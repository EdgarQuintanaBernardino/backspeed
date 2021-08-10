<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directorios', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->bigIncrements('id');
            $table->string('nom', 100)->nullable()->comment('nombre del cliente');
            $table->string('puest',50)->nullable()->comment('puesto del cliente');
            $table->string('correo', 100)->nullable()->unique()->comment('correo del cliente');
            $table->string('tel',15)->unique()->nullable()->comment('telefono del cliente');

            $table->unsignedBigInteger('user_id')->nullable()->comment('Foreign Key');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('restrict')->onDelete('cascade');
          
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
        Schema::dropIfExists('directorios');
    }
}
