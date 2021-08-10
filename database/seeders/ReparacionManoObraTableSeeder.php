<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reparacion;
use App\Models\ManoObra;

class ReparacionManoObraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reparacion=  Reparacion::get();
        $mano_obra= ManoObra::get();
        $repar_id=[];
        foreach($reparacion as $repar){
          array_push($repar_id, $repar->id);
        }
        $contador1 = 0;
        foreach($mano_obra as $mano) {
          $mano->reparaciones()->sync($repar_id[$contador1]);
          $contador1++; 
                 
            }
    }
}
