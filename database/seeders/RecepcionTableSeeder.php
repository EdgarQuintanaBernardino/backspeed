<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recepcion;
class RecepcionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recepcion::factory(102)->create();
    }
}
