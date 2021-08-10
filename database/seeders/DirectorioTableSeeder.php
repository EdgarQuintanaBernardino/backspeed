<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Directorio;

class DirectorioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Directorio::factory(5)->create();
    }
}
