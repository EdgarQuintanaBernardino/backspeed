<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Credito;
class CreditoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Credito::factory(5)->create();
    }
}
