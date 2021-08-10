<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogo;
use App\Models\Cotizacion;
class CatalogoCotizacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catalogos=  Catalogo::get();
        $cotizacion= Cotizacion::get();
        $catalogo_id=[];
        foreach($catalogos as $catalogo){
          array_push($catalogo_id, $catalogo->id);
        }
        $contador1 = 0;
        foreach($cotizacion as $cotiz) {
          $cotiz->catalogos()->sync($catalogo_id[$contador1]);
          $contador1++; 
                 
            }
    }
}
