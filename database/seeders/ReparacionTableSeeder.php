<?php

namespace Database\Seeders;
use App\Models\Reparacion;
use Illuminate\Database\Seeder;

class ReparacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reparacion::factory(100)->create();
    }
}
