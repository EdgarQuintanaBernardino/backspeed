<?php

namespace Database\Factories;

use App\Models\Refaccion;
use App\Models\Reparacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class RefaccionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Refaccion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       
        return [
            'nom'=>$this->faker->name, 
            'cost_unit'=>$this->faker->randomDigit,
            'prec_venta'   => $this->faker->randomDigit ,
            'cant' => $this->faker->randomDigit ,
            'subtotal'   => $this->faker->randomDigit ,
           
        ];
    }
}
