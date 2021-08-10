<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateRecordatoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recordatorios', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->bigIncrements('id');
            $table->string('notif',50)->comment('Si desea que se notifique al cliente');
            $table->string('anti_dias',50)->comment('Dias de anterioridad');
            $table->string('medio',50)->comment('Recordar por correo o por sms');
            $table->unsignedBigInteger('cita_id')->comment('Foreign Key');
            $table->foreign('cita_id')->references('id')->on('citas')->onUpdate('restrict')->onDelete('cascade');
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
    Schema::dropIfExists('recordatorios');
    }
    
}
