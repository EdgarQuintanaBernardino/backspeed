<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recepcion;
use App\Models\Users;
class RecepcionClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $recepcion=  Recepcion::get();
        $users= Users::get();
        $recep_id=[];
        foreach($recepcion as $recep){
          array_push($recep_id, $recep->id);
        }
        $contador1 = 0;
        foreach($users as $user) {
          $user->recepciones()->sync($recep_id[$contador1]);
          $contador1++; 
                 
            }
    }
}
