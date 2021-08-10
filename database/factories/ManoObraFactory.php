<?php

namespace Database\Factories;

use App\Models\ManoObra;
use App\Models\Reparacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManoObraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ManoObra::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       
        return [
            'nom'=>$this->faker->name, 
            'pre_hora'=>$this->faker->randomDigit,
            'horas'=>$this->faker->randomDigit,
            'subtotal'=>$this->faker->randomDigit,
          
        ];
    }
}
