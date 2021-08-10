<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recordatorio;
class RecordatorioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     Recordatorio::factory(10)->create();
    }
}