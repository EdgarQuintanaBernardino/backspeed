<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('citas', function (Blueprint $table) {
        $table->engine ='InnoDB';
        $table->charset = 'utf8mb4';
        $table->collation = 'utf8mb4_unicode_ci';
        $table->bigIncrements('id');
        $table->string('fecha',30)->comment('Fecha de la cita');
        $table->string('nom_cita',100)->nullable()->comment('Nombre de la cita');
        $table->time('hora',6)->unique()->comment('Hora de la cita');
        $table->string('nota',150)->nullable()->comment('Notas de citas');
        $table->string( 'plac_vehiculo')->comment('placas de vehiculos');
        $table->string( 'correo')->comment('correo'); 
        $table->string('opc_domi')->nullable()->comment('opcion de recojer en domicilio');
        $table->string('calle')->nullable()->comment('calle ');
        $table->string('num')->nullable()->comment('num ');
        $table->string('cp')->nullable()->comment('cp');
        $table->string('colonia')->nullable()->comment('colonia');

        $table->string('nom_chofer')->nullable()->comment('nombre del chofer');
        $table->string('concretado')->nullable()->comment('cita concretada y no concretada');



        $table->unsignedBigInteger('status_id')->nullable()->comment('Foreign Key');
        $table->foreign('status_id')->references('id')->on('status')->onUpdate('restrict')->onDelete('cascade');


        $table->unsignedBigInteger('user_id')->comment('Foreign Key');
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
    Schema::dropIfExists('citas');
    }
}
