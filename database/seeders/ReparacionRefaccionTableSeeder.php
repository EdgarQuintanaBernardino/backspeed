<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reparacion;
use App\Models\Refaccion;
class ReparacionRefaccionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reparacion=  Reparacion::get();
        $refaccion= Refaccion::get();
        $repar_id=[];
        foreach($reparacion as $repar){
          array_push($repar_id, $repar->id);
        }
        $contador1 = 0;
        foreach($refaccion as $refacc) {
          $refacc->reparaciones()->sync($repar_id[$contador1]);
          $contador1++; 
                 
            }
    }
}
