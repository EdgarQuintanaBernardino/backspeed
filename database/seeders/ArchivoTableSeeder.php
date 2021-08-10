<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Archivo;

class ArchivoTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    Archivo::factory(2000)->create();
  }
}
