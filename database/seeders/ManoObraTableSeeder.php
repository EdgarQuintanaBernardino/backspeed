<?php

namespace Database\Seeders;
use App\Models\ManoObra;
use Illuminate\Database\Seeder;

class ManoObraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ManoObra::factory(10)->create();
    }
}
