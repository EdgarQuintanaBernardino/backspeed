<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
      Schema::create('catalogos', function (Blueprint $table) {
        $table->engine ='InnoDB';
        $table->charset = 'utf8mb4';
        $table->collation = 'utf8mb4_unicode_ci';
        $table->bigIncrements('id');
        $table->string('nom', 75)->nullable();
        $table->string('descrip',120)->nullable();
        $table->string('cilindros',120)->nullable();
        $table->string('marca',120)->nullable();
        $table->string('modelo',120)->nullable();
        $table->string('categoria',120)->nullable();
        $table->string('costo', 75)->nullable();
        $table->string('precio', 75)->nullable();
        $table->string('total_produc', 75)->nullable();
        $table->string('sugerido', 15)->nullable();

        $table->string('created_at_reg', 75)->comment('Correo del usuario que realizo el registro');
        $table->string('updated_at_reg', 75)->nullable()->comment('Correo del usuario que realizo la última modificación');
       
           /* $table->unsignedBigInteger('reparacion_id')->comment('Foreign Key');
            $table->foreign('reparacion_id')->references('id')->on('reparacions')->onUpdate('restrict')->onDelete('cascade');
            $table->unsignedBigInteger('refaccion_id')->comment('Foreign Key');
            $table->foreign('refaccion_id')->references('id')->on('refacciones')->onUpdate('restrict')->onDelete('cascade');
            $table->unsignedBigInteger('mano_id')->comment('Foreign Key');
            $table->foreign('mano_id')->references('id')->on('mano_obras')->onUpdate('restrict')->onDelete('cascade');*/
          
       
       
       
       
       
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
        Schema::dropIfExists('catalogos');
    }
}
