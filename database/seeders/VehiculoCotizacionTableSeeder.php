<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehiculo;
use App\Models\Cotizacion;
class VehiculoCotizacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $cotizacion=  Cotizacion::get();
        $vehiculos= Vehiculo::get();
        $cotiz_id=[];
        foreach($cotizacion as $cotiz){
          array_push($cotiz_id, $cotiz->id);
        }
        $contador1 = 0;
        foreach($vehiculos as $vehiculo) {
          $vehiculo->cotizaciones()->sync($cotiz_id[$contador1]);
          $contador1++; 
            }
    }
}
