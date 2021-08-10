<?php

namespace Database\Seeders;
use App\Models\Refaccion;
use Illuminate\Database\Seeder;

class RefaccionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Refaccion::factory(10)->create();
    }
}
