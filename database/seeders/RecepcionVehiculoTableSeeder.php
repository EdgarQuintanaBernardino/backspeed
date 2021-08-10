<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recepcion;
use App\Models\Vehiculo;
class RecepcionVehiculoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recepcion= Recepcion::get();
        $vehiculos= Vehiculo::get();
        $recep_id=[];
        foreach($recepcion as $recep){
          array_push($recep_id, $recep->id);
        }
        $contador1 = 0;
        foreach($vehiculos as $vehiculo) {
          $vehiculo->recepciones()->sync($recep_id[$contador1]);
          $contador1++; 
                 
            }
    }
}
