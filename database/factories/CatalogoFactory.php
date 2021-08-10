<?php
namespace Database\Factories;
use App\Models\Catalogo;
use App\Models\Reparacion;
use App\Models\Refaccion;
use App\Models\ManoObra;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CatalogoFactory extends Factory {
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Catalogo::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition() {
    
    $usuario = $this->faker->randomElement(User::pluck('email_registro'));
    
    return [


    'nom'=>$this->faker->name,
    'descrip'=>$this->faker->name,
    'costo'=>$this->faker->randomDigit,
    'precio'=>$this->faker->randomDigit,
    'total_produc'=>$this->faker->randomDigit,
    'sugerido'=>$this->faker->randomElement(['Si','No']),
    'created_at_reg'  => $usuario,
   



    ];
  }
}
 
