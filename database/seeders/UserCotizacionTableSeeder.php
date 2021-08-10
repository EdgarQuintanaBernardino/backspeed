<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cotizacion;
use App\Models\Users;
class UserCotizacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=  Users::get();
        $cotizacion= Cotizacion::get();
        $user_id=[];
        foreach($users as $user){
          array_push($user_id, $user->id);
        }
        $contador1 = 0;
        foreach($cotizacion as $cotiz) {
          $cotiz->users()->sync($user_id[$contador1]);
          $contador1++; 
                 
            }
    }
}
