<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {                       
            $table->engine ='InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->bigIncrements('id');
            $table->string('tip',30)->nullable()->comment('tipo de vehiculo');
            $table->string('plac',30)->unique()->comment('placas del vehiculo');
            $table->string('vin',50)->unique()->nullable()->comment('numero de chasis');
            $table->string('marc',80)->nullable()->comment('marca del vehiculo');
            $table->string('mod',80)->nullable()->comment('modelo del vehiculo');
            $table->string('cat',50)->nullable()->comment('categoria del vehiculo');
            $table->string('año',50)->nullable()->comment('año del vehiculo');
            $table->string('n_motor',50)->nullable()->comment('numero de motor');
            $table->string('c_principal',50)->nullable()->comment('color principal');
            $table->string('engomado',50)->comment('engomado dependiendo de la placa');
            $table->string('m_motor',50)->nullable()->comment('marca del motor');
            $table->string('trans',50)->nullable()->comment('transmisión');
            $table->string('nom_client',50)->nullable()->comment('nombre del cliente');

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
    Schema::dropIfExists('vehiculos');
    }
}
