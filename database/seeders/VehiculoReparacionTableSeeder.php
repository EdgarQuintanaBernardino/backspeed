<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reparacion;
use App\Models\Vehiculo;
class VehiculoReparacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehiculos=  Vehiculo::get();
        $reparaciones= Reparacion::get();
        $vehiculo_id=[];
        foreach($vehiculos as $vehiculo){
          array_push($vehiculo_id, $vehiculo->id);
        }
        $contador1 = 0;
        foreach($reparaciones as $repar) {
          $repar->vehiculos()->sync($vehiculo_id[$contador1]);
          $contador1++; 
                 
            }
    }
}
