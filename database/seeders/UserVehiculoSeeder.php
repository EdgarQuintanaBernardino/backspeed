<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehiculo;
use App\Models\User;

class UserVehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
      $users=  User::get();
      $vehiculos= Vehiculo::get();
      $user_id=[];
      foreach($users as $user){
        array_push($user_id, $user->id);
      }
      $contador1 = 0;
      foreach($vehiculos as $vehiculo) {
        $vehiculo->users()->sync($user_id[$contador1]);
        $contador1++; 
               
          }
    }


}
