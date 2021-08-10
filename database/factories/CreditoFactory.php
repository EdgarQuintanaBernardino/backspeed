<?php

namespace Database\Factories;

use App\Models\Credito;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreditoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Credito::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id_usuario = $this->faker->randomElement(User::pluck('id'));
        return [
            'dias'=>$this->faker->randomDigit(),
            'l_credito'=>$this->faker->numberBetween($min = 1000, $max = 9000),
            'user_id'   => $id_usuario,
            
        ];
    }
}
