<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reparacion;
use App\Models\Catalogo;
class ReparacionCatalogoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reparacion=  Reparacion::get();
        $catalogo= Catalogo::get();
        $repar_id=[];
        foreach($reparacion as $repar){
          array_push($repar_id, $repar->id);
        }
        $contador1 = 0;
        foreach($catalogo as $cat) {
          $cat->reparaciones()->sync($repar_id[$contador1]);
          $contador1++; 
                 
            }
    }
}
