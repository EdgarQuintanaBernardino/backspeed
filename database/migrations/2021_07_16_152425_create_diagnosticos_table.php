<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->bigIncrements('id');

            $table->string('balatas_delant',10)->nullable()->comment('balatas delanteras');
            $table->text('nota_balatas_delant',100)->nullable()->comment('notas para balatas delanteras');
            
            $table->string('balatas_tras',10)->nullable()->comment('balatas traseras');
            $table->text('nota_balatas_tras',100)->nullable()->comment('notas para balatas trasera');
           
            $table->string('luces',10)->nullable()->comment('luces');
            $table->text('nota_luces',100)->nullable()->comment('notas para luces');
           
            $table->string('cristales_espejos',10)->nullable()->comment('cristales y espejos');
            $table->text('nota_cristales_espejos',100)->nullable()->comment('notas para cristales espejos');
           
            $table->string('puertas',10)->nullable()->comment('puertas del vehiculo');
            $table->text('nota_puertas',100)->nullable()->comment('notas para puertas');
           
            $table->string('salpicaderas',10)->nullable()->comment('salpicaderas del vehiculo');
            $table->text('nota_salpicaderas',100)->nullable()->comment('notas para salpicaderas');
           
            $table->string('asientos',10)->nullable()->comment('asientos del vehiculo');
            $table->text('nota_asientos',100)->nullable()->comment('notas para asientos');
            
            $table->string('direccionales',10)->nullable()->comment('direccionales');
            $table->text('nota_direccionales',100)->nullable()->comment('notas para direccionales');

            $table->string('radio',10)->nullable()->comment('radio');
            $table->text('nota_radio',100)->nullable()->comment('notas para radio');

            $table->string('partes_bajas',10)->nullable()->comment('partes bajas del vehiculo');
            $table->text('nota_partes_bajas',100)->nullable()->comment('notas para partes bajas');

            $table->string('caja_dir',10)->nullable()->comment('cajas direccionales');
            $table->text('nota_caja_dir',100)->nullable()->comment('notas para cajas direccionales');

            $table->string('bomba_dir',10)->nullable()->comment('bomba');
            $table->text('nota_bomba_dir',100)->nullable()->comment('notas para bomba');


            $table->string('brazo',10)->nullable()->comment('brazo');
            $table->text('nota_brazo',100)->nullable()->comment('notas para brazo');


            $table->string('guardapv',10)->nullable()->comment('Guarda Polvos');
            $table->text('nota_guardapv',100)->nullable()->comment('notas para guardapv');

            $table->string('manguera',10)->nullable()->comment('manguera');
            $table->text('nota_manguera',100)->nullable()->comment('notas para manguera');

            $table->string('bomba_boster',10)->nullable()->comment('bomba boster');
            $table->text('nota_bomba_boster',100)->nullable()->comment('notas para bomba boster');

            $table->string('mangueras_turbo',10)->nullable()->comment('mangueras turbo');
            $table->text('nota_manguera_turbo',100)->nullable()->comment('notas para manguera turbo');

            $table->string('llanta_delantera_izq',10)->nullable()->comment('llanta delantera izquiera');
            $table->text('nota_llanta_delantera_izq',100)->nullable()->comment('notas para llanta delantera izquierda');

            $table->string('llanta_delantera_der',10)->nullable()->comment('llanta derlantera derecha');
            $table->text('nota_llanta_delantera_der',100)->nullable()->comment('notas para llanta delantera derecha');

            $table->string('llanta_trasera_izq',10)->nullable()->comment('llanta trasera izquierda');
            $table->text('nota_llanta_trasera_izq',100)->nullable()->comment('notas para llanta trasera izquierda');

            $table->string('llanta_trasera_der',10)->nullable()->comment('llanta trasera derecha');
            $table->text('nota_llanta_trasera_der',100)->nullable()->comment('notas para llanta trasera derecha');

            $table->string('cuartos',10)->nullable()->comment('cuartos');
            $table->text('nota_cuartos',100)->nullable()->comment('notas para cuartos');

            $table->string('faros_baja_alta',10)->nullable()->comment('faros baja alta');
            $table->text('nota_faros_baja_alta',100)->nullable()->comment('notas para faros de baja alta');

            $table->string('faros_niebla',10)->nullable()->comment('faros niebla');
            $table->text('nota_faros_niebla',100)->nullable()->comment('notas para faros niebla');

            $table->string('intermitentes_direccionales',10)->nullable()->comment('intermitentes y direccionales');
            $table->text('nota_intermitentes',100)->nullable()->comment('notas para intermitentes y direccionales');

            $table->string('luz_techo',10)->nullable()->comment('luces del techo del vehiculo');
            $table->text('nota_luz_techo',100)->nullable()->comment('notas para luces del techo');

            $table->string('reversa_alto',10)->nullable()->comment('reversa alto');
            $table->text('nota_reversa_alto',100)->nullable()->comment('notas para reversa y altos');

            $table->string('cables_bujias',10)->nullable()->comment('cables y bujias');
            $table->text('nota_cables_bujias',100)->nullable()->comment('notas para cables y bujias');

            $table->string('manguera_estado',10)->nullable()->comment('manguera y estado');
            $table->text('nota_manguera_estado',100)->nullable()->comment('notas para manguera y estado');

            $table->string('bandas',10)->nullable()->comment('bandas');
            $table->text('nota_bandas',100)->nullable()->comment('notas para bandas');

            $table->string('fuga_aire',10)->nullable()->comment('fuga de aire');
            $table->text('nota_fuga_aire',100)->nullable()->comment('notas para fugas de aire');

            $table->string('alineacion_motor',10)->nullable()->comment('alineacion de motor ');
            $table->text('nota_alineacion_motor',100)->nullable()->comment('notas para alineacion de motor');

            $table->string('aceite_motor',10)->nullable()->comment('aceite de motor ');
            $table->text('nota_aceite_motor',100)->nullable()->comment('notas para aceite motor');

            $table->string('aceite_direccion_h',10)->nullable()->comment('aceite de direccion hidraulica');
            $table->text('nota_aceite_direccion_h',100)->nullable()->comment('notas para aceite de direccion hidraulica');

            $table->string('aceite_transmision',10)->nullable()->comment('aceite transmision');
            $table->text('nota_aceite_transmision',100)->nullable()->comment('notas para aceite de transmision');

            $table->string('liquido_refri',10)->nullable()->comment('liquido refrigerante');
            $table->text('nota_liquido_refrigerante',100)->nullable()->comment('notas para liquido refrigerante');

            $table->string('liquido_frenos',10)->nullable()->comment('liquido de frenos');
            $table->text('nota_liquido_frenos',100)->nullable()->comment('notas para liquido de frenos');

            $table->string('liquido_limpiaparabrisas',10)->nullable()->comment('liquido limpiabarabrisas');
            $table->text('nota_liquido_limpiaparabrisas',100)->nullable()->comment('notas para liquido limpia parabrisas');

            $table->string('indicadores_abordo',10)->nullable()->comment('indicadores abordos');
            $table->text('nota_indicadores_abordo',100)->nullable()->comment('notas para indircadores abordo');

            $table->string('claxon',10)->nullable()->comment('claxon');
            $table->text('nota_claxon',100)->nullable()->comment('notas para claxon');

            $table->string('sistema_parabrisas',10)->nullable()->comment('sistema parabrisas');
            $table->text('nota_sistema_parabrisas',100)->nullable()->comment('notas para el sistema de parabrisas');

            $table->string('ventilacion',10)->nullable()->comment('ventilacion');
            $table->text('nota_ventilacion',100)->nullable()->comment('notas para ventilacion');

            $table->string('funcionamiento_compresor',10)->nullable()->comment('funcionamiento compresor');
            $table->text('nota_funcionamiento_compresor',100)->nullable()->comment('notas para funcionamiento compresor');

            $table->string('fugas_sistema_aa',10)->nullable()->comment('fugas de sistema aa');
            $table->text('nota_sistema_aa',100)->nullable()->comment('notas para el sistema AA');

            $table->string('filtro_polen',10)->nullable()->comment('filtro de polen ');
            $table->text('nota_filtro_polen',100)->nullable()->comment('notas para filtro_polen');

            $table->string('bateria',10)->nullable()->comment('bateria');
            $table->text('nota_bateria',100)->nullable()->comment('notas para bateria');

            $table->string('rotulas',10)->nullable()->comment('rotulas');
            $table->text('nota_rotulas',100)->nullable()->comment('notas para las rotulas');

            $table->string('amortiguadores_delant',10)->nullable()->comment('amortiguadores delanteras');
            $table->text('nota_amortiguadores_delant',100)->nullable()->comment('notas para amortiguadores_delanteros');

            $table->string('base_amort_delant',10)->nullable()->comment('base de amoritiguadores delanteros');
            $table->text('nota_base_amort_delant',100)->nullable()->comment('notas para la base de amortiguadores delanteros');

            $table->string('barra_estab',10)->nullable()->comment('barra ');
            $table->text('nota_barra_estab',100)->nullable()->comment('notas para barra');

            $table->string('muelles',10)->nullable()->comment('muelles');
            $table->text('nota_muelles',100)->nullable()->comment('notas para muelles');

            $table->string('soporte',10)->nullable()->comment('soporte');
            $table->text('nota_soporte',100)->nullable()->comment('notas para soporte');

            $table->string('amortiguadores_tras',10)->nullable()->comment('amoriguadores traseros');
            $table->text('nota_amortiguadores_tras',100)->nullable()->comment('notas para amortiguadores traseros');

            $table->string('base_amort_tras',10)->nullable()->comment('base de amortiguadores traseros');
            $table->text('nota_base_amort_tras',100)->nullable()->comment('notas para base de amoriguadores traseros');

            $table->string('resortes_suspencion',10)->nullable()->comment('resortes suspenciones');
            $table->text('nota_resortes_suspencion',100)->nullable()->comment('notas para indircadores abordo');

            $table->string('eje_trasero',10)->nullable()->comment('ejes traseros ');
            $table->text('nota_eje_trasero',100)->nullable()->comment('notas para jes traseros');

            $table->string('fuga_aceite_trans',10)->nullable()->comment('fuga de aceite');
            $table->text('nota_fuga_aceite_trans',100)->nullable()->comment('notas para fuga de aceite');

            $table->string('cubrepolvos_semiejes',10)->nullable()->comment('cubre polvos semiejes');
            $table->text('nota_cubrepolvos_semiejes',100)->nullable()->comment('notas para cubrepolvos y semiejes');

            $table->string('lineas_escape',10)->nullable()->comment('lineas de escape');
            $table->text('nota_lineas_escape',100)->nullable()->comment('notas para lineas de escape');

            $table->string('llanta_refaccion',10)->nullable()->comment('llanta de refaccion');
            $table->text('nota_llanta_refaccion',100)->nullable()->comment('notas para la llanta de refaccion');

            $table->string('gomas_limpiaparabrisas',10)->nullable()->comment('gomas del limpiaparabrisas');
            $table->text('nota_gomas_limpiaparabrisas',100)->nullable()->comment('notas para gomas de limpiaparabrisas');



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
        Schema::dropIfExists('diagnosticos');
    }
}
