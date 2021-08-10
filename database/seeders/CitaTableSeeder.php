<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Cita;
use Faker\Factory as Faker;
class CitaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        $statusIds = array();

        array_push($statusIds, DB::getPdo()->lastInsertId());
        DB::table('status')->insert([
            'name' => 'Confirmado',
            'class' => 'success',
        ]);
        array_push($statusIds, DB::getPdo()->lastInsertId());
        DB::table('status')->insert([
            'name' => 'Sin Confirmar',
            'class' => 'danger',
        ]);
        array_push($statusIds, DB::getPdo()->lastInsertId());

     Cita::factory(10)->create();
    }
}
