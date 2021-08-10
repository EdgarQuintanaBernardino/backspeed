<?php

namespace Database\Factories;

use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
class VehiculoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehiculo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nom_client = $this->faker->randomElement(User::pluck('name'));
        return [

            'tip'=>$this->faker->randomElement(['Automovil']),
            'plac'=>$this->faker->unique()->swiftBicNumber,
            'vin'=>$this->faker->unique()->ean8,
            'marc'=>$this->faker->firstNameMale,
            'mod'=>$this->faker->firstNameMale  ,
            'cat'=>$this->faker->firstNameMale  ,
            'año'=>$this->faker->year,
            'n_motor'=>$this->faker->ean8 ,
            'c_principal'=>$this->faker->colorName,
            'engomado'=>$this->faker->randomElement(['Rosa','Amarillo','Rojo','Verde','Azul']),
            'n_motor'=>$this->faker->swiftBicNumber ,
            'trans'=>$this->faker->randomElement(['Automotica','Estandar']),
            'nom_client'=>$nom_client,
        ];
    }
}
