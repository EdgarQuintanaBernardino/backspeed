<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacion', function (Blueprint $table) {
            
            $table->engine ='InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->bigIncrements('id');
            $table->string('tip',30)->nullable()->comment('tipo de persona');
            $table->string('rfc',50)->nullable()->unique()->comment('rfc del cliente');
            $table->string('r_social', 100)->nullable()->unique()->comment('razon social');
            $table->string('calle', 100)->nullable()->comment('calle del cliente');
            $table->string('n_ext', 10)->nullable()->comment('numero exterior del domicilio del cliente');
            $table->string('n_int', 10)->nullable()->comment('numero interior del domicilio del cliente');

            $table->string('cp', 15)->nullable()->comment('codigo postal');
            $table->string('col', 50)->nullable()->comment('colonia');
            $table->string('loc', 50)->nullable()->comment('localidad');
            $table->string('est', 100)->nullable()->comment('estado');
            $table->string('cd',50)->nullable()->comment('ciudad');
            $table->string('tel1',15)->nullable()->comment('telefono uno');
            $table->string('tel2', 15)->nullable()->comment('telefono dos');
            $table->string('notas', 250)->nullable()->comment('notas para facturacion');
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
        Schema::dropIfExists('facturacion');
    }
}
