<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reparacion;
use App\Models\Cotizacion;
class ReparacionCotizacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reparacion=  Reparacion::get();
        $cotizaciones= Cotizacion::get();
        $repar_id=[];
        foreach($reparacion as $repar){
          array_push($repar_id, $repar->id);
        }
        $contador1 = 0;
        foreach($cotizaciones as $cotizacion) {
          $cotizacion->reparaciones()->sync($repar_id[$contador1]);
          $contador1++; 
                 
            }
    }
}
