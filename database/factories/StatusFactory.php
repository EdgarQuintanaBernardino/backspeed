<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Status as Status;

class StatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Status::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [     
            'name' =>$this->faker->unique()->randomElement(['Confirmado','Sin confirmar']),
            'class' => $this->faker->unique()->randomElement(['danger','success']),
        ];
    }
}
