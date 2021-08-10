<?php

namespace Database\Seeders;
use App\Models\Cotizacion;
use Illuminate\Database\Seeder;

class CotizacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cotizacion::factory(100)->create();
    }
}
